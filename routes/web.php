<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InventoryApiController;
use App\Livewire\Dashboard;
use App\Livewire\Users\UserTable;
use App\Livewire\Roles\RoleManager;
use App\Livewire\Inventory\InventoryDashboard;
use App\Livewire\Inventory\Products\ProductTable;
use App\Livewire\Inventory\Warehouses\WarehouseTable;
use App\Livewire\Inventory\Suppliers\SupplierTable;
use App\Livewire\Inventory\Purchases\PurchaseOrderTable;
use App\Livewire\Inventory\Sales\SalesOrderTable;
use App\Livewire\Inventory\Reports\InventoryReportsDashboard;
use App\Livewire\Portfolio\HomePage;
use App\Livewire\Portfolio\ContactForm;
use App\Livewire\Admin\ProjectTable;
use App\Livewire\Admin\SkillTable;
use App\Livewire\Admin\ExperienceTable;
use App\Livewire\Admin\TestimonialTable;
use App\Livewire\Admin\BlogPostTable;
use App\Livewire\Admin\SettingsForm;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/users', UserTable::class)->name('users.index');
    Route::get('/roles', RoleManager::class)->name('roles.index');
    Route::get('/inventory', InventoryDashboard::class)->name('inventory.dashboard');
    Route::get('/inventory/products', ProductTable::class)->name('inventory.products.index');
    Route::get('/inventory/warehouses', WarehouseTable::class)->name('inventory.warehouses.index');
    Route::get('/inventory/suppliers', SupplierTable::class)->name('inventory.suppliers.index');
    Route::get('/inventory/purchases', PurchaseOrderTable::class)->name('inventory.purchases.index');
    Route::get('/inventory/sales', SalesOrderTable::class)->name('inventory.sales.index');
    Route::get('/inventory/reports', InventoryReportsDashboard::class)->name('inventory.reports.index');
    
    // Portfolio Admin Routes
    Route::prefix('admin/portfolio')->group(function () {
        Route::get('/projects', ProjectTable::class)->name('admin.portfolio.projects');
        Route::get('/skills', SkillTable::class)->name('admin.portfolio.skills');
        Route::get('/experiences', ExperienceTable::class)->name('admin.portfolio.experiences');
        Route::get('/testimonials', TestimonialTable::class)->name('admin.portfolio.testimonials');
        Route::get('/blog', BlogPostTable::class)->name('admin.portfolio.blog');
        Route::get('/settings', SettingsForm::class)->name('admin.portfolio.settings');
    });
});

Route::prefix('api')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/products', [InventoryApiController::class, 'products']);
    Route::get('/warehouses', [InventoryApiController::class, 'warehouses']);
    Route::get('/suppliers', [InventoryApiController::class, 'suppliers']);
    Route::get('/purchases', [InventoryApiController::class, 'purchases']);
    Route::get('/sales', [InventoryApiController::class, 'sales']);
    Route::get('/reports/inventory', [InventoryApiController::class, 'inventoryReports']);
});

// Public Portfolio Routes
Route::get('/', HomePage::class)->name('portfolio.home');

require __DIR__.'/auth.php';