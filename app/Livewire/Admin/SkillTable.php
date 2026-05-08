<?php

namespace App\Livewire\Admin;

use App\Models\Skill;
use Livewire\Component;
use Livewire\Attributes\Validate;

class SkillTable extends Component
{
    public $skills = [];
    public $modalVisible = false;
    public $editingSkill = null;

    #[Validate('required|string|max:100')]
    public $name = '';

    #[Validate('required|string|max:100')]
    public $category = '';

    #[Validate('required|integer|min:0|max:100')]
    public $proficiency = 50;

    #[Validate('required|in:beginner,intermediate,advanced,expert')]
    public $level = 'intermediate';

    #[Validate('nullable|string')]
    public $description = '';

    #[Validate('required|integer|min:0')]
    public $display_order = 0;

    #[Validate('required|in:active,inactive')]
    public $status = 'active';

    public function mount()
    {
        $this->loadSkills();
    }

    public function loadSkills()
    {
        $this->skills = Skill::orderBy('display_order')->get()->toArray();
    }

    public function create()
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        $this->editingSkill = $skill->id;
        $this->name = $skill->name;
        $this->category = $skill->category;
        $this->proficiency = $skill->proficiency;
        $this->level = $skill->level;
        $this->description = $skill->description;
        $this->display_order = $skill->display_order;
        $this->status = $skill->status;
        $this->modalVisible = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->editingSkill) {
            $skill = Skill::findOrFail($this->editingSkill);
            $skill->update([
                'name' => $this->name,
                'category' => $this->category,
                'proficiency' => $this->proficiency,
                'level' => $this->level,
                'description' => $this->description,
                'display_order' => $this->display_order,
                'status' => $this->status,
            ]);
        } else {
            Skill::create([
                'name' => $this->name,
                'category' => $this->category,
                'proficiency' => $this->proficiency,
                'level' => $this->level,
                'description' => $this->description,
                'display_order' => $this->display_order,
                'status' => $this->status,
            ]);
        }

        $this->resetForm();
        $this->loadSkills();
        $this->dispatch('notify', message: 'Skill saved successfully');
    }

    public function delete($id)
    {
        Skill::findOrFail($id)->delete();
        $this->loadSkills();
        $this->dispatch('notify', message: 'Skill deleted successfully');
    }

    private function resetForm()
    {
        $this->reset(['name', 'category', 'proficiency', 'level', 'description', 'display_order', 'status', 'editingSkill']);
        $this->modalVisible = false;
    }

    public function render()
    {
        return view('livewire.admin.skill-table');
    }
}
