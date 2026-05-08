<?php

namespace App\Enums;

enum PermissionsEnum: string
{
    // Users Module
    case USERS_VIEW = 'users.view';
    case USERS_CREATE = 'users.create';
    case USERS_UPDATE = 'users.update';
    case USERS_DELETE = 'users.delete';
    case USERS_ASSIGN_ROLES = 'users.assign_roles';
    
    // Roles Module
    case ROLES_VIEW = 'roles.view';
    case ROLES_CREATE = 'roles.create';
    case ROLES_UPDATE = 'roles.update';
    case ROLES_DELETE = 'roles.delete';
    
    // Permissions Module
    case PERMISSIONS_VIEW = 'permissions.view';
    case PERMISSIONS_ASSIGN = 'permissions.assign';
    case PERMISSIONS_MANAGE = 'permissions.manage';
    
    // Teams Module
    case TEAMS_VIEW = 'teams.view';
    case TEAMS_CREATE = 'teams.create';
    case TEAMS_UPDATE = 'teams.update';
    case TEAMS_DELETE = 'teams.delete';
    case TEAMS_MANAGE_MEMBERS = 'teams.manage_members';
    
    // Projects Module
    case PROJECTS_VIEW = 'projects.view';
    case PROJECTS_CREATE = 'projects.create';
    case PROJECTS_UPDATE = 'projects.update';
    case PROJECTS_DELETE = 'projects.delete';
    
    // Inventory Module
    case INVENTORY_VIEW = 'inventory.view';
    case INVENTORY_CREATE = 'inventory.create';
    case INVENTORY_UPDATE = 'inventory.update';
    case INVENTORY_DELETE = 'inventory.delete';
    case INVENTORY_AUDIT = 'inventory.audit';
    case INVENTORY_TRANSFER = 'inventory.transfer';
    case INVENTORY_ADJUST = 'inventory.adjust';
    
    // Products Module
    case PRODUCTS_VIEW = 'products.view';
    case PRODUCTS_CREATE = 'products.create';
    case PRODUCTS_UPDATE = 'products.update';
    case PRODUCTS_DELETE = 'products.delete';
    
    // Warehouse Module
    case WAREHOUSES_VIEW = 'warehouses.view';
    case WAREHOUSES_CREATE = 'warehouses.create';
    case WAREHOUSES_UPDATE = 'warehouses.update';
    case WAREHOUSES_DELETE = 'warehouses.delete';
    
    // Suppliers Module
    case SUPPLIERS_VIEW = 'suppliers.view';
    case SUPPLIERS_CREATE = 'suppliers.create';
    case SUPPLIERS_UPDATE = 'suppliers.update';
    case SUPPLIERS_DELETE = 'suppliers.delete';
    
    // Purchase Module
    case PURCHASES_VIEW = 'purchases.view';
    case PURCHASES_CREATE = 'purchases.create';
    case PURCHASES_APPROVE = 'purchases.approve';
    case PURCHASES_DELETE = 'purchases.delete';
    
    // Sales Module
    case SALES_VIEW = 'sales.view';
    case SALES_CREATE = 'sales.create';
    case SALES_APPROVE = 'sales.approve';
    case SALES_DELETE = 'sales.delete';
    
    // Reports Module
    case REPORTS_INVENTORY = 'reports.inventory';
    case REPORTS_SALES = 'reports.sales';
    case REPORTS_AUDIT = 'reports.audit';
    
    // Audit Module
    case AUDITS_VIEW = 'audits.view';
    
    // Settings Module
    case SETTINGS_MANAGE = 'settings.manage';
    
    // Dashboard
    case DASHBOARD_VIEW = 'dashboard.view';
    
    public static function getModulePermissions(string $module): array
    {
        return array_filter(self::cases(), function ($permission) use ($module) {
            return str_starts_with($permission->value, $module);
        });
    }
}