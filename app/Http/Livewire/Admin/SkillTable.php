<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Skill;

class SkillTable extends Component
{
    public $skills = [];
    public $modalVisible = false;
    public $editingSkill;
    public $form = [
        'name' => '',
        'category' => '',
        'icon' => '',
        'proficiency' => 80,
        'level' => 'advanced',
        'description' => '',
        'display_order' => 0,
        'status' => 'active',
    ];

    protected function rules(): array
    {
        return [
            'form.name' => 'required|string|max:120',
            'form.category' => 'nullable|string|max:90',
            'form.icon' => 'nullable|string|max:80',
            'form.proficiency' => 'required|integer|min:0|max:100',
            'form.level' => 'required|string|max:40',
            'form.description' => 'nullable|string|max:800',
            'form.display_order' => 'required|integer|min:0|max:100',
            'form.status' => 'required|string|in:active,inactive',
        ];
    }

    public function mount(): void
    {
        $this->loadSkills();
    }

    public function loadSkills(): void
    {
        $this->skills = Skill::orderBy('display_order')->get();
    }

    public function create(): void
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function edit(Skill $skill): void
    {
        $this->editingSkill = $skill;
        $this->form = [
            'name' => $skill->name,
            'category' => $skill->category,
            'icon' => $skill->icon,
            'proficiency' => $skill->proficiency,
            'level' => $skill->level,
            'description' => $skill->description,
            'display_order' => $skill->display_order,
            'status' => $skill->status,
        ];
        $this->modalVisible = true;
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editingSkill) {
            $this->editingSkill->update($this->form);
        } else {
            Skill::create($this->form);
        }

        $this->resetForm();
        $this->modalVisible = false;
        $this->loadSkills();

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Skill saved successfully.',
        ]);
    }

    public function delete(Skill $skill): void
    {
        $skill->delete();
        $this->loadSkills();
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Skill removed.',
        ]);
    }

    protected function resetForm(): void
    {
        $this->editingSkill = null;
        $this->form = [
            'name' => '',
            'category' => '',
            'icon' => '',
            'proficiency' => 80,
            'level' => 'advanced',
            'description' => '',
            'display_order' => 0,
            'status' => 'active',
        ];
    }

    public function render()
    {
        return view('livewire.admin.skill-table');
    }
}
