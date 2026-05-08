<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\InventoryAudit;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\SalesOrder;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\User;
use App\Policies\InventoryAuditPolicy;
use App\Policies\ProductPolicy;
use App\Policies\PurchaseOrderPolicy;
use App\Policies\ReportPolicy;
use App\Policies\SalesOrderPolicy;
use App\Policies\SupplierPolicy;
use App\Policies\WarehousePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
        Product::class => ProductPolicy::class,
        Warehouse::class => WarehousePolicy::class,
        Supplier::class => SupplierPolicy::class,
        PurchaseOrder::class => PurchaseOrderPolicy::class,
        SalesOrder::class => SalesOrderPolicy::class,
        InventoryAudit::class => InventoryAuditPolicy::class,
    ];

    public function boot(): void
{
        $this->registerPolicies();
        
        // Implicitly grant "Super Admin" role all permissions
        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });
        
        // Register custom gates
        Gate::define('view-admin-dashboard', function ($user) {
            return $user->hasPermissionTo('dashboard.view');
        });
    }
}