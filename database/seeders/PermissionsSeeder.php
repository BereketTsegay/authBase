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