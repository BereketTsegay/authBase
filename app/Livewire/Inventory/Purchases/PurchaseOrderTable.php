<?php

namespace App\Livewire\Inventory\Purchases;

use Livewire\Component;
use Livewire\Attributes\Validate;

class PurchaseOrderTable extends Component
{
    public $purchaseOrders = [];
    public $modalVisible = false;
    public $editingOrder = null;

    #[Validate('required|string|max:100')]
    public $po_number = '';

    #[Validate('required|integer')]
    public $supplier_id = 0;

    #[Validate('required|date')]
    public $order_date = '';

    #[Validate('nullable|date|after:order_date')]
    public $expected_delivery = '';

    #[Validate('required|numeric|min:0')]
    public $total_amount = 0;

    #[Validate('required|in:pending,confirmed,shipped,delivered,cancelled')]
    public $status = 'pending';

    public function mount()
    {
        $this->loadOrders();
    }

    public function loadOrders()
    {
        $this->purchaseOrders = [];
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
        $this->dispatch('notify', message: 'Purchase order saved successfully');
    }

    public function delete($id)
    {
        $this->loadOrders();
        $this->dispatch('notify', message: 'Purchase order deleted successfully');
    }

    private function resetForm()
    {
        $this->reset(['po_number', 'supplier_id', 'order_date', 'expected_delivery', 'total_amount', 'status', 'editingOrder']);
        $this->modalVisible = false;
    }

    public function render()
    {
        return view('livewire.inventory.purchases.purchase-order-table');
    }
}
