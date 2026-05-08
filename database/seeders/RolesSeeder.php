<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Enums\PermissionsEnum;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // Super Admin Role
        $superAdmin = Role::updateOrCreate(
            ['name' => 'super-admin'],
            ['guard_name' => 'web', 'description' => 'Super Administrator with full access', 'is_system' => true]
        );
        $superAdmin->syncPermissions(Permission::all());
        
        // Admin Role
        $admin = Role::updateOrCreate(
            ['name' => 'admin'],
            ['guard_name' => 'web', 'description' => 'Administrator with most permissions', 'is_system' => true]
        );
        $admin->syncPermissions([
            PermissionsEnum::USERS_VIEW->value,
            PermissionsEnum::USERS_CREATE->value,
            PermissionsEnum::USERS_UPDATE->value,
            PermissionsEnum::USERS_DELETE->value,
            PermissionsEnum::ROLES_VIEW->value,
            PermissionsEnum::ROLES_CREATE->value,
            PermissionsEnum::ROLES_UPDATE->value,
            PermissionsEnum::PERMISSIONS_VIEW->value,
            PermissionsEnum::TEAMS_VIEW->value,
            PermissionsEnum::TEAMS_CREATE->value,
            PermissionsEnum::TEAMS_UPDATE->value,
            PermissionsEnum::AUDITS_VIEW->value,
            PermissionsEnum::DASHBOARD_VIEW->value,
        ]);
        
        // Manager Role
        $manager = Role::updateOrCreate(
            ['name' => 'manager'],
            ['guard_name' => 'web', 'description' => 'Manager with team management permissions', 'is_system' => true]
        );
        $manager->syncPermissions([
            PermissionsEnum::USERS_VIEW->value,
            PermissionsEnum::USERS_UPDATE->value,
            PermissionsEnum::TEAMS_VIEW->value,
            PermissionsEnum::TEAMS_MANAGE_MEMBERS->value,
            PermissionsEnum::DASHBOARD_VIEW->value,
        ]);
        
        // Editor Role
        $editor = Role::updateOrCreate(
            ['name' => 'editor'],
            ['guard_name' => 'web', 'description' => 'Editor with content management permissions', 'is_system' => true]
        );
        $editor->syncPermissions([
            PermissionsEnum::USERS_VIEW->value,
            PermissionsEnum::DASHBOARD_VIEW->value,
        ]);
        
        // User Role
        $user = Role::updateOrCreate(
            ['name' => 'user'],
            ['guard_name' => 'web', 'description' => 'Regular user with basic access', 'is_system' => true]
        );
        $user->syncPermissions([
            PermissionsEnum::DASHBOARD_VIEW->value,
        ]);
    }
}