<?php

namespace App\Livewire\Inventory\Products;

use Livewire\Component;
use Livewire\Attributes\Validate;

class ProductTable extends Component
{
    public $products = [];
    public $modalVisible = false;
    public $editingProduct = null;

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|string|max:500')]
    public $description = '';

    #[Validate('required|numeric|min:0.01')]
    public $price = 0;

    #[Validate('required|integer|min:0')]
    public $quantity = 0;

    #[Validate('required|string|max:100')]
    public $sku = '';

    #[Validate('required|string|max:100')]
    public $category = '';

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $this->products = [];
    }

    public function create()
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function edit($id)
    {
        $this->editingProduct = $id;
        $this->modalVisible = true;
    }

    public function save()
    {
        $this->validate();
        $this->resetForm();
        $this->loadProducts();
        $this->dispatch('notify', message: 'Product saved successfully');
    }

    public function delete($id)
    {
        $this->loadProducts();
        $this->dispatch('notify', message: 'Product deleted successfully');
    }

    private function resetForm()
    {
        $this->reset(['name', 'description', 'price', 'quantity', 'sku', 'category', 'editingProduct']);
        $this->modalVisible = false;
    }

    public function render()
    {
        return view('livewire.inventory.products.product-table');
    }
}
