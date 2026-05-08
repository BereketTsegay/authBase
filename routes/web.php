<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Users\UserTable;
use App\Livewire\Roles\RoleManager;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/users', UserTable::class)->name('users.index');
    Route::get('/roles', RoleManager::class)->name('roles.index');
});

// require __DIR__.'/auth.php';