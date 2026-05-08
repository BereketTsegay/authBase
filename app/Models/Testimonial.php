<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Guarded;

#[Guarded([])]
class Testimonial extends Model
{
    use HasFactory;

    protected $casts = [
        'rating' => 'integer',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
