<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as SpatieRole;

use Illuminate\Database\Eloquent\Attributes\Guarded;
#[Guarded([])]
class Role extends SpatieRole
{
    //

     use LogsActivity, SoftDeletes;

     protected $casts = [
        'is_system' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'role_team');
    }

    public function scopeSystem($query)
    {
        return $query->where('is_system', true);
    }

    public function scopeNotSystem($query)
    {
        return $query->where('is_system', false);
    }
}
