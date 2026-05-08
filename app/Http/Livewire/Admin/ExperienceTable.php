<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Experience;

class ExperienceTable extends Component
{
    public $experiences = [];
    public $modalVisible = false;
    public $editingExperience;
    public $form = [
        'title' => '',
        'company' => '',
        'location' => '',
        'start_date' => '',
        'end_date' => '',
        'is_current' => false,
        'summary' => '',
        'responsibilities' => [],
        'company_logo' => '',
        'display_order' => 0,
        'status' => 'active',
    ];

    protected function rules(): array
    {
        return [
            'form.title' => 'required|string|max:180',
            'form.company' => 'required|string|max:160',
            'form.location' => 'nullable|string|max:120',
            'form.start_date' => 'required|date',
            'form.end_date' => 'nullable|date|after_or_equal:form.start_date',
            'form.is_current' => 'boolean',
            'form.summary' => 'nullable|string|max:1000',
            'form.responsibilities' => 'nullable|array',
            'form.company_logo' => 'nullable|url|max:800',
            'form.display_order' => 'required|integer|min:0|max:100',
            'form.status' => 'required|string|in:active,inactive',
        ];
    }

    public function mount(): void
    {
        $this->loadExperiences();
    }

    public function loadExperiences(): void
    {
        $this->experiences = Experience::orderBy('display_order')->get();
    }

    public function create(): void
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function edit(Experience $experience): void
    {
        $this->editingExperience = $experience;
        $this->form = [
            'title' => $experience->title,
            'company' => $experience->company,
            'location' => $experience->location,
            'start_date' => $experience->start_date?->format('Y-m-d'),
            'end_date' => $experience->end_date?->format('Y-m-d'),
            'is_current' => $experience->is_current,
            'summary' => $experience->summary,
            'responsibilities' => $experience->responsibilities ?? [],
            'company_logo' => $experience->company_logo,
            'display_order' => $experience->display_order,
            'status' => $experience->status,
        ];
        $this->modalVisible = true;
    }

    public function save(): void
    {
        $this->validate();

        $payload = array_merge($this->form, [
            'responsibilities' => array_filter($this->form['responsibilities'] ?? []),
        ]);

        if ($this->editingExperience) {
            $this->editingExperience->update($payload);
        } else {
            Experience::create($payload);
        }

        $this->resetForm();
        $this->modalVisible = false;
        $this->loadExperiences();

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Experience entry saved successfully.',
        ]);
    }

    public function delete(Experience $experience): void
    {
        $experience->delete();
        $this->loadExperiences();

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Experience item has been deleted.',
        ]);
    }

    protected function resetForm(): void
    {
        $this->editingExperience = null;
        $this->form = [
            'title' => '',
            'company' => '',
            'location' => '',
            'start_date' => '',
            'end_date' => '',
            'is_current' => false,
            'summary' => '',
            'responsibilities' => [],
            'company_logo' => '',
            'display_order' => 0,
            'status' => 'active',
        ];
    }

    public function render()
    {
        return view('livewire.admin.experience-table');
    }
}
