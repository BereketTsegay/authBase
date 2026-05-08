<?php

namespace App\Livewire\Admin;

use App\Models\Experience;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Carbon\Carbon;

class ExperienceTable extends Component
{
    public $experiences = [];
    public $modalVisible = false;
    public $editingExperience = null;

    #[Validate('required|string|max:100')]
    public $company = '';

    #[Validate('required|string|max:100')]
    public $role = '';

    #[Validate('required|date')]
    public $start_date = '';

    #[Validate('nullable|date|after:start_date')]
    public $end_date = '';

    #[Validate('nullable|string')]
    public $description = '';

    #[Validate('required|integer|min:0')]
    public $display_order = 0;

    #[Validate('required|in:published,draft')]
    public $status = 'published';

    public function mount()
    {
        $this->loadExperiences();
    }

    public function loadExperiences()
    {
        $this->experiences = Experience::orderByDesc('start_date')->get()->toArray();
    }

    public function create()
    {
        $this->resetForm();
        $this->start_date = date('Y-m-01');
        $this->modalVisible = true;
    }

    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        $this->editingExperience = $experience->id;
        $this->company = $experience->company;
        $this->role = $experience->role;
        $this->start_date = $experience->start_date->format('Y-m-d');
        $this->end_date = $experience->end_date?->format('Y-m-d') ?? '';
        $this->description = $experience->description;
        $this->display_order = $experience->display_order;
        $this->status = $experience->status;
        $this->modalVisible = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->editingExperience) {
            $experience = Experience::findOrFail($this->editingExperience);
            $experience->update([
                'company' => $this->company,
                'role' => $this->role,
                'start_date' => Carbon::parse($this->start_date),
                'end_date' => $this->end_date ? Carbon::parse($this->end_date) : null,
                'description' => $this->description,
                'display_order' => $this->display_order,
                'status' => $this->status,
            ]);
        } else {
            Experience::create([
                'company' => $this->company,
                'role' => $this->role,
                'start_date' => Carbon::parse($this->start_date),
                'end_date' => $this->end_date ? Carbon::parse($this->end_date) : null,
                'description' => $this->description,
                'display_order' => $this->display_order,
                'status' => $this->status,
            ]);
        }

        $this->resetForm();
        $this->loadExperiences();
        $this->dispatch('notify', message: 'Experience saved successfully');
    }

    public function delete($id)
    {
        Experience::findOrFail($id)->delete();
        $this->loadExperiences();
        $this->dispatch('notify', message: 'Experience deleted successfully');
    }

    private function resetForm()
    {
        $this->reset(['company', 'role', 'start_date', 'end_date', 'description', 'display_order', 'status', 'editingExperience']);
        $this->modalVisible = false;
    }

    public function render()
    {
        return view('livewire.admin.experience-table');
    }
}
