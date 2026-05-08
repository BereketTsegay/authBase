<?php

namespace App\Livewire\Inventory\Suppliers;

use Livewire\Component;
use Livewire\Attributes\Validate;

class SupplierTable extends Component
{
    public $suppliers = [];
    public $modalVisible = false;
    public $editingSupplier = null;

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|email|max:255')]
    public $email = '';

    #[Validate('required|string|max:20')]
    public $phone = '';

    #[Validate('required|string|max:300')]
    public $address = '';

    #[Validate('required|string|max:100')]
    public $country = '';

    #[Validate('required|in:active,inactive')]
    public $status = 'active';

    public function mount()
    {
        $this->loadSuppliers();
    }

    public function loadSuppliers()
    {
        $this->suppliers = [];
    }

    public function create()
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function edit($id)
    {
        $this->editingSupplier = $id;
        $this->modalVisible = true;
    }

    public function save()
    {
        $this->validate();
        $this->resetForm();
        $this->loadSuppliers();
        $this->dispatch('notify', message: 'Supplier saved successfully');
    }

    public function delete($id)
    {
        $this->loadSuppliers();
        $this->dispatch('notify', message: 'Supplier deleted successfully');
    }

    private function resetForm()
    {
        $this->reset(['name', 'email', 'phone', 'address', 'country', 'status', 'editingSupplier']);
        $this->modalVisible = false;
    }

    public function render()
    {
        return view('livewire.inventory.suppliers.supplier-table');
    }
}
