<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Guarded;

#[Guarded([])]
class Contact extends Model
{
    use HasFactory;

    protected $casts = [
        'seen_at' => 'datetime',
    ];
}
