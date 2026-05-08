<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Testimonial;

class TestimonialTable extends Component
{
    public $testimonials = [];
    public $modalVisible = false;
    public $editingTestimonial;
    public $form = [
        'name' => '',
        'role' => '',
        'company' => '',
        'quote' => '',
        'avatar' => '',
        'rating' => 5,
        'display_order' => 0,
        'status' => 'published',
    ];

    protected function rules(): array
    {
        return [
            'form.name' => 'required|string|max:120',
            'form.role' => 'nullable|string|max:120',
            'form.company' => 'nullable|string|max:120',
            'form.quote' => 'required|string|max:1200',
            'form.avatar' => 'nullable|url|max:800',
            'form.rating' => 'required|integer|min:1|max:5',
            'form.display_order' => 'required|integer|min:0|max:100',
            'form.status' => 'required|string|in:published,draft',
        ];
    }

    public function mount(): void
    {
        $this->loadTestimonials();
    }

    public function loadTestimonials(): void
    {
        $this->testimonials = Testimonial::orderBy('display_order')->get();
    }

    public function create(): void
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function edit(Testimonial $testimonial): void
    {
        $this->editingTestimonial = $testimonial;
        $this->form = [
            'name' => $testimonial->name,
            'role' => $testimonial->role,
            'company' => $testimonial->company,
            'quote' => $testimonial->quote,
            'avatar' => $testimonial->avatar,
            'rating' => $testimonial->rating,
            'display_order' => $testimonial->display_order,
            'status' => $testimonial->status,
        ];
        $this->modalVisible = true;
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editingTestimonial) {
            $this->editingTestimonial->update($this->form);
        } else {
            Testimonial::create($this->form);
        }

        $this->resetForm();
        $this->modalVisible = false;
        $this->loadTestimonials();

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Testimonial saved successfully.',
        ]);
    }

    public function delete(Testimonial $testimonial): void
    {
        $testimonial->delete();
        $this->loadTestimonials();
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Testimonial deleted.',
        ]);
    }

    protected function resetForm(): void
    {
        $this->editingTestimonial = null;
        $this->form = [
            'name' => '',
            'role' => '',
            'company' => '',
            'quote' => '',
            'avatar' => '',
            'rating' => 5,
            'display_order' => 0,
            'status' => 'published',
        ];
    }

    public function render()
    {
        return view('livewire.admin.testimonial-table');
    }
}
