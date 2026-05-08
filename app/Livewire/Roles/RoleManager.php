<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role;
use App\Models\Permission;
use App\Enums\PermissionsEnum;
use Illuminate\Validation\Rule;

class RoleManager extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $showRoleModal = false;
    public $showDeleteModal = false;
    public $editingRoleId = null;
    public $deletingRoleId = null;
    
    public $name = '';
    public $description = '';
    public $selectedPermissions = [];
    public $permissionGroups = [];

    protected $rules = [
        'name' => 'required|string|max:255|unique:roles,name',
        'description' => 'nullable|string|max:500',
    ];

    public function mount()
    {
        $this->loadPermissionGroups();
    }

    public function loadPermissionGroups()
    {
        $permissions = Permission::all();
        $this->permissionGroups = $permissions->groupBy(function ($permission) {
            return explode('.', $permission->name)[0];
        });
    }

    public function createRole()
    {
        $this->resetForm();
        $this->editingRoleId = null;
        $this->showRoleModal = true;
    }

    public function editRole($roleId)
    {
        $role = Role::findOrFail($roleId);
        $this->editingRoleId = $roleId;
        $this->name = $role->name;
        $this->description = $role->description;
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();
        
        $this->rules['name'] = 'required|string|max:255|unique:roles,name,' . $roleId;
        $this->showRoleModal = true;
    }

    public function saveRole()
    {
        $validatedData = $this->validate();
        
        if ($this->editingRoleId) {
            $role = Role::findOrFail($this->editingRoleId);
            $role->update([
                'name' => $this->name,
                'description' => $this->description,
            ]);
        } else {
            $role = Role::create([
                'name' => $this->name,
                'description' => $this->description,
                'guard_name' => 'web',
            ]);
        }
        
        $role->syncPermissions($this->selectedPermissions);
        
        $this->dispatch('notify', ['message' => 'Role saved successfully!', 'type' => 'success']);
        $this->showRoleModal = false;
        $this->resetForm();
    }

    public function confirmDelete($roleId)
    {
        $this->deletingRoleId = $roleId;
        $this->showDeleteModal = true;
    }

    public function deleteRole()
    {
        $role = Role::findOrFail($this->deletingRoleId);
        
        if ($role->is_system) {
            $this->dispatch('notify', ['message' => 'Cannot delete system role!', 'type' => 'error']);
        } else {
            $role->delete();
            $this->dispatch('notify', ['message' => 'Role deleted successfully!', 'type' => 'success']);
        }
        
        $this->showDeleteModal = false;
        $this->deletingRoleId = null;
    }

    public function cloneRole($roleId)
    {
        $originalRole = Role::findOrFail($roleId);
        $newRole = $originalRole->replicate();
        $newRole->name = $originalRole->name . ' (Copy)';
        $newRole->is_system = false;
        $newRole->save();
        
        $newRole->syncPermissions($originalRole->permissions);
        
        $this->dispatch('notify', ['message' => 'Role cloned successfully!', 'type' => 'success']);
    }

    private function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->selectedPermissions = [];
        $this->rules['name'] = 'required|string|max:255|unique:roles,name';
    }

    public function render()
    {
        $roles = Role::when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        $permissions = Permission::all();

        return view('livewire.roles.role-manager', [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
}