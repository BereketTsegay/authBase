<?php

namespace App\Livewire\Inventory\Sales;

use Livewire\Component;
use Livewire\Attributes\Validate;

class SalesOrderTable extends Component
{
    public $salesOrders = [];
    public $modalVisible = false;
    public $editingOrder = null;

    #[Validate('required|string|max:100')]
    public $so_number = '';

    #[Validate('required|email')]
    public $customer_email = '';

    #[Validate('required|date')]
    public $order_date = '';

    #[Validate('nullable|date|after:order_date')]
    public $delivery_date = '';

    #[Validate('required|numeric|min:0')]
    public $total_amount = 0;

    #[Validate('required|in:pending,processing,shipped,delivered,cancelled')]
    public $status = 'pending';

    public function mount()
    {
        $this->loadOrders();
    }

    public function loadOrders()
    {
        $this->salesOrders = [];
    }

    public function create()
    {
        $this->resetForm();
        $this->order_date = date('Y-m-d');
        $this->modalVisible = true;
    }

    public function edit($id)
    {
        $this->editingOrder = $id;
        $this->modalVisible = true;
    }

    public function save()
    {
        $this->validate();
        $this->resetForm();
        $this->loadOrders();
        $this->dispatch('notify', message: 'Sales order saved successfully');
    }

    public function delete($id)
    {
        $this->loadOrders();
        $this->dispatch('notify', message: 'Sales order deleted successfully');
    }

    private function resetForm()
    {
        $this->reset(['so_number', 'customer_email', 'order_date', 'delivery_date', 'total_amount', 'status', 'editingOrder']);
        $this->modalVisible = false;
    }

    public function render()
    {
        return view('livewire.inventory.sales.sales-order-table');
    }
}
