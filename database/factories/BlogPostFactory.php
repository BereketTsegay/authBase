<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\BlogPost;

class BlogPostFactory extends Factory
{
    protected $model = BlogPost::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(6, true);

        return [
            'team_id' => null,
            'author_id' => null,
            'created_by' => null,
            'updated_by' => null,
            'title' => $title,
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(100, 999),
            'excerpt' => $this->faker->sentence(16),
            'content' => implode("\n\n", $this->faker->paragraphs(4)),
            'cover_image' => 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=1200&q=80',
            'category' => $this->faker->randomElement(['Portfolio', 'Design', 'Development', 'Productivity']),
            'tags' => $this->faker->randomElements(['Laravel', 'Livewire', 'UX', 'Tailwind', 'Studio', 'Strategy'], 3),
            'published_at' => now()->subDays($this->faker->numberBetween(1, 60)),
            'status' => 'published',
        ];
    }
}
