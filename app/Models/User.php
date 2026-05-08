<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
// use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\HasTeams;
use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Guarded([])]
#[Hidden(['password', 'remember_token','two_factor_secret','two_factor_recovery_codes'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use LogsActivity, SoftDeletes, HasApiTokens, HasFactory, Notifiable, HasRoles, HasTeams;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'two_factor_confirmed_at' => 'datetime',
            'last_login_at' => 'datetime',
            'locked_until' => 'datetime',
            'is_active' => 'boolean',
            'preferences' => 'array',
            'notification_preferences' => 'array',
            'device_info' => 'array',
            'email_notifications' => 'boolean',
            'marketing_emails' => 'boolean',
            'login_attempts' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'api_token_last_used_at' => 'datetime',
            'api_rate_limited_until' => 'datetime'
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    protected $appends = ['avatar_url'];

    public function getAvatarUrlAttribute(): string
    {
        return 'https://ui-avatars.com/api/?background=FFD60A&color=0A0A0A&name=' . urlencode($this->name);
    }

    public function loginHistories()
    {
        return $this->hasMany(LoginHistory::class);
    }

    public function activities()
    {
        return $this->hasMany(ActivityLog::class, 'causer_id');
    }

    public function currentLoginHistory()
    {
        return $this->hasOne(LoginHistory::class)->where('is_active', true);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for verified users
     */
    public function scopeVerified($query)
    {
        return $query->whereNotNull('email_verified_at');
    }

    /**
     * Scope for locked out users
     */
    public function scopeLocked($query)
    {
        return $query->where('locked_until', '>', now());
    }

    /**
     * Check if user account is locked
     */
    public function isLocked(): bool
    {
        return $this->locked_until && $this->locked_until > now();
    }

    /**
     * Increment login attempts
     */
    public function incrementLoginAttempts(): void
    {
        $this->increment('login_attempts');
        
        if ($this->login_attempts >= 5) {
            $this->locked_until = now()->addMinutes(15);
            $this->save();
        }
    }

    /**
     * Reset login attempts
     */
    public function resetLoginAttempts(): void
    {
        $this->update([
            'login_attempts' => 0,
            'locked_until' => null,
        ]);
    }

    /**
     * Record user login
     */
    public function recordLogin(string $ip, string $userAgent, string $sessionId): void
    {
        $this->update([
            'last_login_at' => now(),
            'last_login_ip' => $ip,
            'last_login_user_agent' => $userAgent,
            'session_id' => $sessionId,
            'device_info' => json_encode([
                'user_agent' => $userAgent,
                'ip' => $ip,
                'session_id' => $sessionId,
            ]),
        ]);

        LoginHistory::create([
            'user_id' => $this->id,
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'login_at' => now(),
            'session_id' => $sessionId,
            'is_active' => true,
        ]);
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($user) {
            if (empty($user->email_verified_at)) {
                $user->email_verified_at = null;
            }
        });
    }
}
