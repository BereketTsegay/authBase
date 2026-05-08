<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Guarded;

#[Guarded([])]
class SiteSetting extends Model
{
    use HasFactory;

    protected $casts = [
        'social_links' => 'array',
    ];

    public function scopeCurrent($query)
    {
        return $query->orderBy('id', 'asc')->limit(1);
    }
}
