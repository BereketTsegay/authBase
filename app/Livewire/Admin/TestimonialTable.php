<?php

namespace App\Livewire\Admin;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\Attributes\Validate;

class TestimonialTable extends Component
{
    public $testimonials = [];
    public $modalVisible = false;
    public $editingTestimonial = null;

    #[Validate('required|string|max:100')]
    public $name = '';

    #[Validate('required|string|max:100')]
    public $company = '';

    #[Validate('required|string|max:100')]
    public $role = '';

    #[Validate('required|string')]
    public $quote = '';

    #[Validate('nullable|url')]
    public $avatar = '';

    #[Validate('required|integer|min:0')]
    public $display_order = 0;

    #[Validate('required|in:published,draft')]
    public $status = 'published';

    public function mount()
    {
        $this->loadTestimonials();
    }

    public function loadTestimonials()
    {
        $this->testimonials = Testimonial::orderBy('display_order')->get()->toArray();
    }

    public function create()
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $this->editingTestimonial = $testimonial->id;
        $this->name = $testimonial->name;
        $this->company = $testimonial->company;
        $this->role = $testimonial->role;
        $this->quote = $testimonial->quote;
        $this->avatar = $testimonial->avatar;
        $this->display_order = $testimonial->display_order;
        $this->status = $testimonial->status;
        $this->modalVisible = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->editingTestimonial) {
            $testimonial = Testimonial::findOrFail($this->editingTestimonial);
            $testimonial->update([
                'name' => $this->name,
                'company' => $this->company,
                'role' => $this->role,
                'quote' => $this->quote,
                'avatar' => $this->avatar,
                'display_order' => $this->display_order,
                'status' => $this->status,
            ]);
        } else {
            Testimonial::create([
                'name' => $this->name,
                'company' => $this->company,
                'role' => $this->role,
                'quote' => $this->quote,
                'avatar' => $this->avatar,
                'display_order' => $this->display_order,
                'status' => $this->status,
            ]);
        }

        $this->resetForm();
        $this->loadTestimonials();
        $this->dispatch('notify', message: 'Testimonial saved successfully');
    }

    public function delete($id)
    {
        Testimonial::findOrFail($id)->delete();
        $this->loadTestimonials();
        $this->dispatch('notify', message: 'Testimonial deleted successfully');
    }

    private function resetForm()
    {
        $this->reset(['name', 'company', 'role', 'quote', 'avatar', 'display_order', 'status', 'editingTestimonial']);
        $this->modalVisible = false;
    }

    public function render()
    {
        return view('livewire.admin.testimonial-table');
    }
}
