<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Enums\PermissionsEnum;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Users Module
            ['name' => PermissionsEnum::USERS_VIEW->value, 'module' => 'users', 'description' => 'View users'],
            ['name' => PermissionsEnum::USERS_CREATE->value, 'module' => 'users', 'description' => 'Create users'],
            ['name' => PermissionsEnum::USERS_UPDATE->value, 'module' => 'users', 'description' => 'Update users'],
            ['name' => PermissionsEnum::USERS_DELETE->value, 'module' => 'users', 'description' => 'Delete users'],
            ['name' => PermissionsEnum::USERS_ASSIGN_ROLES->value, 'module' => 'users', 'description' => 'Assign roles to users'],
            
            // Roles Module
            ['name' => PermissionsEnum::ROLES_VIEW->value, 'module' => 'roles', 'description' => 'View roles'],
            ['name' => PermissionsEnum::ROLES_CREATE->value, 'module' => 'roles', 'description' => 'Create roles'],
            ['name' => PermissionsEnum::ROLES_UPDATE->value, 'module' => 'roles', 'description' => 'Update roles'],
            ['name' => PermissionsEnum::ROLES_DELETE->value, 'module' => 'roles', 'description' => 'Delete roles'],
            
            // Permissions Module
            ['name' => PermissionsEnum::PERMISSIONS_VIEW->value, 'module' => 'permissions', 'description' => 'View permissions'],
            ['name' => PermissionsEnum::PERMISSIONS_ASSIGN->value, 'module' => 'permissions', 'description' => 'Assign permissions'],
            ['name' => PermissionsEnum::PERMISSIONS_MANAGE->value, 'module' => 'permissions', 'description' => 'Manage permissions'],
            
            // Teams Module
            ['name' => PermissionsEnum::TEAMS_VIEW->value, 'module' => 'teams', 'description' => 'View teams'],
            ['name' => PermissionsEnum::TEAMS_CREATE->value, 'module' => 'teams', 'description' => 'Create teams'],
            ['name' => PermissionsEnum::TEAMS_UPDATE->value, 'module' => 'teams', 'description' => 'Update teams'],
            ['name' => PermissionsEnum::TEAMS_DELETE->value, 'module' => 'teams', 'description' => 'Delete teams'],
            ['name' => PermissionsEnum::TEAMS_MANAGE_MEMBERS->value, 'module' => 'teams', 'description' => 'Manage team members'],
            
            // Inventory Module
            ['name' => PermissionsEnum::INVENTORY_VIEW->value, 'module' => 'inventory', 'description' => 'View inventory dashboard and stock'],
            ['name' => PermissionsEnum::INVENTORY_CREATE->value, 'module' => 'inventory', 'description' => 'Create inventory records'],
            ['name' => PermissionsEnum::INVENTORY_UPDATE->value, 'module' => 'inventory', 'description' => 'Update inventory records'],
            ['name' => PermissionsEnum::INVENTORY_DELETE->value, 'module' => 'inventory', 'description' => 'Delete inventory records'],
            ['name' => PermissionsEnum::INVENTORY_AUDIT->value, 'module' => 'inventory', 'description' => 'Perform inventory audits'],
            ['name' => PermissionsEnum::INVENTORY_TRANSFER->value, 'module' => 'inventory', 'description' => 'Perform inventory transfers'],
            ['name' => PermissionsEnum::INVENTORY_ADJUST->value, 'module' => 'inventory', 'description' => 'Adjust stock quantities'],
            
            // Products Module
            ['name' => PermissionsEnum::PRODUCTS_VIEW->value, 'module' => 'products', 'description' => 'View products'],
            ['name' => PermissionsEnum::PRODUCTS_CREATE->value, 'module' => 'products', 'description' => 'Create products'],
            ['name' => PermissionsEnum::PRODUCTS_UPDATE->value, 'module' => 'products', 'description' => 'Update products'],
            ['name' => PermissionsEnum::PRODUCTS_DELETE->value, 'module' => 'products', 'description' => 'Delete products'],
            
            // Warehouse Module
            ['name' => PermissionsEnum::WAREHOUSES_VIEW->value, 'module' => 'warehouses', 'description' => 'View warehouses'],
            ['name' => PermissionsEnum::WAREHOUSES_CREATE->value, 'module' => 'warehouses', 'description' => 'Create warehouses'],
            ['name' => PermissionsEnum::WAREHOUSES_UPDATE->value, 'module' => 'warehouses', 'description' => 'Update warehouses'],
            ['name' => PermissionsEnum::WAREHOUSES_DELETE->value, 'module' => 'warehouses', 'description' => 'Delete warehouses'],
            
            // Suppliers Module
            ['name' => PermissionsEnum::SUPPLIERS_VIEW->value, 'module' => 'suppliers', 'description' => 'View suppliers'],
            ['name' => PermissionsEnum::SUPPLIERS_CREATE->value, 'module' => 'suppliers', 'description' => 'Create suppliers'],
            ['name' => PermissionsEnum::SUPPLIERS_UPDATE->value, 'module' => 'suppliers', 'description' => 'Update suppliers'],
            ['name' => PermissionsEnum::SUPPLIERS_DELETE->value, 'module' => 'suppliers', 'description' => 'Delete suppliers'],
            
            // Purchase Module
            ['name' => PermissionsEnum::PURCHASES_VIEW->value, 'module' => 'purchases', 'description' => 'View purchases'],
            ['name' => PermissionsEnum::PURCHASES_CREATE->value, 'module' => 'purchases', 'description' => 'Create purchase orders'],
            ['name' => PermissionsEnum::PURCHASES_APPROVE->value, 'module' => 'purchases', 'description' => 'Approve purchase orders'],
            ['name' => PermissionsEnum::PURCHASES_DELETE->value, 'module' => 'purchases', 'description' => 'Delete purchase orders'],
            
            // Sales Module
            ['name' => PermissionsEnum::SALES_VIEW->value, 'module' => 'sales', 'description' => 'View sales orders'],
            ['name' => PermissionsEnum::SALES_CREATE->value, 'module' => 'sales', 'description' => 'Create sales orders'],
            ['name' => PermissionsEnum::SALES_APPROVE->value, 'module' => 'sales', 'description' => 'Approve sales orders'],
            ['name' => PermissionsEnum::SALES_DELETE->value, 'module' => 'sales', 'description' => 'Delete sales orders'],
            
            // Reports Module
            ['name' => PermissionsEnum::REPORTS_INVENTORY->value, 'module' => 'reports', 'description' => 'View inventory reports'],
            ['name' => PermissionsEnum::REPORTS_SALES->value, 'module' => 'reports', 'description' => 'View sales reports'],
            ['name' => PermissionsEnum::REPORTS_AUDIT->value, 'module' => 'reports', 'description' => 'View audit reports'],
            
            // Audit Module
            ['name' => PermissionsEnum::AUDITS_VIEW->value, 'module' => 'audits', 'description' => 'View audit logs'],
            
            // Settings Module
            ['name' => PermissionsEnum::SETTINGS_MANAGE->value, 'module' => 'settings', 'description' => 'Manage settings'],
            
            // Dashboard
            ['name' => PermissionsEnum::DASHBOARD_VIEW->value, 'module' => 'dashboard', 'description' => 'View dashboard'],
        ];
        
        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                $permission
            );
        }
    }
}