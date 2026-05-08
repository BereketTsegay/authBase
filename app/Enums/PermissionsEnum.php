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