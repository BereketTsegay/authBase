<?php

namespace App\Livewire\Inventory\Warehouses;

use Livewire\Component;
use Livewire\Attributes\Validate;

class WarehouseTable extends Component
{
    public $warehouses = [];
    public $modalVisible = false;
    public $editingWarehouse = null;

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|string|max:500')]
    public $location = '';

    #[Validate('required|string|max:200')]
    public $address = '';

    #[Validate('nullable|string|max:20')]
    public $phone = '';

    #[Validate('required|in:active,inactive')]
    public $status = 'active';

    public function mount()
    {
        $this->loadWarehouses();
    }

    public function loadWarehouses()
    {
        $this->warehouses = [];
    }

    public function create()
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function edit($id)
    {
        $this->editingWarehouse = $id;
        $this->modalVisible = true;
    }

    public function save()
    {
        $this->validate();
        $this->resetForm();
        $this->loadWarehouses();
        $this->dispatch('notify', message: 'Warehouse saved successfully');
    }

    public function delete($id)
    {
        $this->loadWarehouses();
        $this->dispatch('notify', message: 'Warehouse deleted successfully');
    }

    private function resetForm()
    {
        $this->reset(['name', 'location', 'address', 'phone', 'status', 'editingWarehouse']);
        $this->modalVisible = false;
    }

    public function render()
    {
        return view('livewire.inventory.warehouses.warehouse-table');
    }
}
