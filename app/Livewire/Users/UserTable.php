<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserTable extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $status = '';
    public $roleFilter = '';
    public $teamFilter = '';
    public $perPage = 10;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    
    // Modal states
    public $showUserModal = false;
    public $showDeleteModal = false;
    public $showRolesModal = false;
    public $editingUserId = null;
    public $deletingUserId = null;
    
    // Form fields
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $is_active = true;
    public $selectedRoles = [];
    public $selectedTeams = [];
    public $teamRoles = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'is_active' => 'boolean',
    ];

    protected $listeners = ['refreshUsers' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function createUser()
    {
        $this->resetForm();
        $this->editingUserId = null;
        $this->showUserModal = true;
    }

    public function editUser($userId)
    {
        $user = User::findOrFail($userId);
        $this->editingUserId = $userId;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_active = $user->is_active;
        $this->selectedRoles = $user->roles->pluck('id')->toArray();
        $this->selectedTeams = $user->teams->pluck('id')->toArray();
        
        $this->rules['email'] = 'required|email|unique:users,email,' . $userId;
        $this->rules['password'] = 'nullable|min:8|confirmed';
        
        $this->showUserModal = true;
    }

    public function saveUser()
    {
        $validatedData = $this->validate();
        
        if ($this->editingUserId) {
            $user = User::findOrFail($this->editingUserId);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'is_active' => $this->is_active,
            ]);
            
            if ($this->password) {
                $user->update(['password' => Hash::make($this->password)]);
            }
        } else {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'is_active' => $this->is_active,
            ]);
        }
        
        $user->syncRoles($this->selectedRoles);
        
        $this->dispatch('notify', ['message' => 'User saved successfully!', 'type' => 'success']);
        $this->showUserModal = false;
        $this->resetForm();
    }

    public function confirmDelete($userId)
    {
        $this->deletingUserId = $userId;
        $this->showDeleteModal = true;
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->deletingUserId);
        $user->delete();
        
        $this->dispatch('notify', ['message' => 'User deleted successfully!', 'type' => 'success']);
        $this->showDeleteModal = false;
        $this->deletingUserId = null;
    }

    public function manageRoles($userId)
    {
        $user = User::findOrFail($userId);
        $this->editingUserId = $userId;
        $this->selectedRoles = $user->roles->pluck('id')->toArray();
        $this->showRolesModal = true;
    }

    public function updateRoles()
    {
        $user = User::findOrFail($this->editingUserId);
        $user->syncRoles($this->selectedRoles);
        
        $this->dispatch('notify', ['message' => 'Roles updated successfully!', 'type' => 'success']);
        $this->showRolesModal = false;
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->is_active = true;
        $this->selectedRoles = [];
        $this->selectedTeams = [];
        $this->teamRoles = [];
        
        $this->rules['password'] = 'required|min:8|confirmed';
    }

    public function render()
    {
        $users = User::with(['roles', 'teams'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status !== '', function ($query) {
                $query->where('is_active', $this->status === 'active');
            })
            ->when($this->roleFilter, function ($query) {
                $query->whereHas('roles', function ($q) {
                    $q->where('role_id', $this->roleFilter);
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        $roles = Role::all();
        $teams = Team::all();

        return view('livewire.users.user-table', [
            'users' => $users,
            'roles' => $roles,
            'teams' => $teams,
        ]);
    }
}