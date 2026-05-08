<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Experience;

class ExperienceFactory extends Factory
{
    protected $model = Experience::class;

    public function definition(): array
    {
        return [
            'team_id' => null,
            'created_by' => null,
            'updated_by' => null,
            'title' => $this->faker->jobTitle(),
            'company' => $this->faker->company(),
            'location' => $this->faker->city() . ', ' . $this->faker->country(),
            'start_date' => now()->subYears($this->faker->numberBetween(1, 6))->subMonths($this->faker->numberBetween(0, 11)),
            'end_date' => now()->subMonths($this->faker->numberBetween(0, 2)),
            'is_current' => false,
            'summary' => $this->faker->sentence(15),
            'responsibilities' => $this->faker->sentences(4),
            'company_logo' => 'https://images.unsplash.com/photo-1545239351-1141bd82e8a6?auto=format&fit=crop&w=400&q=80',
            'display_order' => $this->faker->numberBetween(1, 8),
            'status' => 'active',
        ];
    }
}
