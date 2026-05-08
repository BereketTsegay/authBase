<?php

namespace App\Livewire\Inventory;

use Livewire\Component;

class InventoryDashboard extends Component
{
    public function render()
    {
        return view('livewire.inventory.inventory-dashboard')
            ->layout('layouts.app');
    }
}
