<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Project;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(4, true);

        return [
            'team_id' => null,
            'created_by' => null,
            'updated_by' => null,
            'title' => $title,
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(100, 999),
            'description' => $this->faker->paragraphs(3, true),
            'thumbnail' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=80',
            'cover_image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1200&q=80',
            'tech_stack' => $this->faker->randomElements(['Laravel', 'Livewire', 'Tailwind', 'Alpine.js', 'MySQL', 'Vue.js', 'React', 'TypeScript'], 4),
            'category' => $this->faker->randomElement(['Web App', 'UI/UX', 'Dashboard', 'Branding']),
            'featured' => $this->faker->boolean(30),
            'status' => 'published',
            'priority' => $this->faker->numberBetween(1, 10),
            'published_at' => now()->subDays($this->faker->numberBetween(1, 90)),
        ];
    }
}
