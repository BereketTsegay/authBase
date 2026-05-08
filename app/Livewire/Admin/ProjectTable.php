<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ProjectTable extends Component
{
    public $projects = [];
    public $modalVisible = false;
    public $editingProject = null;

    #[Validate('required|string|max:255')]
    public $title = '';

    #[Validate('required|string|max:255')]
    public $slug = '';

    #[Validate('nullable|string')]
    public $description = '';

    #[Validate('required|string|max:100')]
    public $category = '';

    #[Validate('boolean')]
    public $featured = false;

    #[Validate('in:published,draft')]
    public $status = 'draft';

    #[Validate('nullable|url')]
    public $thumbnail = '';

    #[Validate('nullable|url')]
    public $cover_image = '';

    public $tech_stack = [];

    public function mount()
    {
        $this->loadProjects();
    }

    public function loadProjects()
    {
        $this->projects = Project::all()->toArray();
    }

    public function create()
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $this->editingProject = $project->id;
        $this->title = $project->title;
        $this->slug = $project->slug;
        $this->description = $project->description;
        $this->category = $project->category;
        $this->featured = $project->featured;
        $this->status = $project->status;
        $this->thumbnail = $project->thumbnail;
        $this->cover_image = $project->cover_image;
        $this->tech_stack = $project->tech_stack ?? [];
        $this->modalVisible = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->editingProject) {
            $project = Project::findOrFail($this->editingProject);
            $project->update([
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'category' => $this->category,
                'featured' => $this->featured,
                'status' => $this->status,
                'thumbnail' => $this->thumbnail,
                'cover_image' => $this->cover_image,
                'tech_stack' => array_values(array_filter($this->tech_stack)),
            ]);
        } else {
            Project::create([
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'category' => $this->category,
                'featured' => $this->featured,
                'status' => $this->status,
                'thumbnail' => $this->thumbnail,
                'cover_image' => $this->cover_image,
                'tech_stack' => array_values(array_filter($this->tech_stack)),
            ]);
        }

        $this->resetForm();
        $this->loadProjects();
        $this->dispatch('notify', message: 'Project saved successfully');
    }

    public function delete($id)
    {
        Project::findOrFail($id)->delete();
        $this->loadProjects();
        $this->dispatch('notify', message: 'Project deleted successfully');
    }

    private function resetForm()
    {
        $this->reset(['title', 'slug', 'description', 'category', 'featured', 'status', 'thumbnail', 'cover_image', 'tech_stack', 'editingProject']);
        $this->modalVisible = false;
    }

    public function render()
    {
        return view('livewire.admin.project-table');
    }
}
