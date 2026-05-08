<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use App\Traits\LogsActivity;

class Permission extends SpatiePermission
{
    use LogsActivity;

    protected $fillable = [
        'name',
        'guard_name',
        'module',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function scopeModule($query, $module)
    {
        return $query->where('module', $module);
    }

    public static function getModules(): array
    {
        return self::select('module')->distinct()->pluck('module')->toArray();
    }
}
