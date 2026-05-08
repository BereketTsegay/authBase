<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Skill;

class SkillFactory extends Factory
{
    protected $model = Skill::class;

    public function definition(): array
    {
        $categories = ['Frontend', 'Backend', 'DevOps', 'Database', 'UI/UX'];
        $tech = $this->faker->randomElement(['Laravel', 'Livewire', 'Tailwind CSS', 'Alpine.js', 'MySQL', 'Docker', 'Figma', 'Git']);

        return [
            'team_id' => null,
            'created_by' => null,
            'updated_by' => null,
            'name' => $tech,
            'category' => $this->faker->randomElement($categories),
            'icon' => 'hit-icon',
            'proficiency' => $this->faker->numberBetween(70, 100),
            'level' => $this->faker->randomElement(['advanced', 'intermediate', 'expert']),
            'description' => $this->faker->sentence(10),
            'display_order' => $this->faker->numberBetween(1, 12),
            'status' => 'active',
        ];
    }
}
