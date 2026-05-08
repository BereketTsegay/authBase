<?php

namespace App\Http\Livewire\Portfolio;

use Livewire\Component;
use App\Models\SiteSetting;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Testimonial;
use App\Models\BlogPost;

class HomePage extends Component
{
    public $search = '';
    public $category = 'All';
    public $settings;

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => 'All'],
    ];

    public function mount(): void
    {
        $this->settings = SiteSetting::current()->first() ?? new SiteSetting();
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function getProjectCategoriesProperty()
    {
        return Project::where('status', 'published')
            ->pluck('category')
            ->filter()
            ->unique()
            ->values();
    }

    public function getFilteredProjectsProperty()
    {
        return Project::where('status', 'published')
            ->when($this->category !== 'All', fn ($query) => $query->where('category', $this->category))
            ->when($this->search, fn ($query) => $query->where(function ($query) {
                $query->where('title', 'like', "%{$this->search}%")
                    ->orWhere('description', 'like', "%{$this->search}%");
            }))
            ->orderByDesc('featured')
            ->orderByDesc('published_at')
            ->get();
    }

    public function render()
    {
        return view('livewire.portfolio.home-page', [
            'settings' => $this->settings,
            'projects' => $this->filteredProjects,
            'skills' => Skill::where('status', 'active')->orderByDesc('proficiency')->get(),
            'experiences' => Experience::where('status', 'active')->orderBy('display_order')->get(),
            'testimonials' => Testimonial::where('status', 'published')->orderBy('display_order')->get(),
            'blogPosts' => BlogPost::where('status', 'published')->orderByDesc('published_at')->limit(3)->get(),
        ])->layout('layouts.portfolio');
    }
}
