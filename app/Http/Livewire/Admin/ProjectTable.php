<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectTable extends Component
{
    public $projects = [];
    public $modalVisible = false;
    public $editingProject;
    public $form = [
        'title' => '',
        'slug' => '',
        'description' => '',
        'thumbnail' => '',
        'cover_image' => '',
        'tech_stack' => [],
        'category' => '',
        'featured' => false,
        'status' => 'published',
    ];

    protected function rules(): array
    {
        return [
            'form.title' => 'required|string|max:180',
            'form.slug' => 'required|string|max:180|unique:projects,slug,' . ($this->editingProject->id ?? 'NULL'),
            'form.description' => 'nullable|string|max:2000',
            'form.thumbnail' => 'nullable|url|max:800',
            'form.cover_image' => 'nullable|url|max:800',
            'form.tech_stack' => 'nullable|array',
            'form.category' => 'nullable|string|max:80',
            'form.featured' => 'boolean',
            'form.status' => 'required|string|in:published,draft',
        ];
    }

    public function mount(): void
    {
        $this->loadProjects();
    }

    public function updatedFormTitle(): void
    {
        if (! $this->editingProject) {
            $this->form['slug'] = Str::slug($this->form['title']);
        }
    }

    public function loadProjects(): void
    {
        $this->projects = Project::orderByDesc('featured')->orderByDesc('published_at')->get();
    }

    public function create(): void
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function edit(Project $project): void
    {
        $this->editingProject = $project;
        $this->form = [
            'title' => $project->title,
            'slug' => $project->slug,
            'description' => $project->description,
            'thumbnail' => $project->thumbnail,
            'cover_image' => $project->cover_image,
            'tech_stack' => $project->tech_stack ?? [],
            'category' => $project->category,
            'featured' => $project->featured,
            'status' => $project->status,
        ];
        $this->modalVisible = true;
    }

    public function save(): void
    {
        $this->validate();

        $data = array_merge($this->form, [
            'tech_stack' => array_filter($this->form['tech_stack'] ?? []),
            'published_at' => now(),
        ]);

        if ($this->editingProject) {
            $this->editingProject->update($data);
        } else {
            Project::create($data);
        }

        $this->resetForm();
        $this->modalVisible = false;
        $this->loadProjects();

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Project saved successfully.',
        ]);
    }

    public function delete(Project $project): void
    {
        $project->delete();
        $this->loadProjects();
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Project removed from the portfolio.',
        ]);
    }

    protected function resetForm(): void
    {
        $this->editingProject = null;
        $this->form = [
            'title' => '',
            'slug' => '',
            'description' => '',
            'thumbnail' => '',
            'cover_image' => '',
            'tech_stack' => [],
            'category' => '',
            'featured' => false,
            'status' => 'published',
        ];
    }

    public function render()
    {
        return view('livewire.admin.project-table');
    }
}
