<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Testimonial;

class TestimonialFactory extends Factory
{
    protected $model = Testimonial::class;

    public function definition(): array
    {
        return [
            'team_id' => null,
            'created_by' => null,
            'updated_by' => null,
            'name' => $this->faker->name(),
            'role' => $this->faker->jobTitle(),
            'company' => $this->faker->company(),
            'quote' => $this->faker->paragraph(2),
            'avatar' => 'https://ui-avatars.com/api/?background=FFD60A&color=0A0A0A&name=' . urlencode($this->faker->name()),
            'rating' => $this->faker->numberBetween(4, 5),
            'display_order' => $this->faker->numberBetween(1, 6),
            'status' => 'published',
        ];
    }
}
