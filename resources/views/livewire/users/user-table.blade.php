<div>
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">User Management</h1>
            <p class="text-text-muted mt-1">Manage system users, roles, and permissions</p>
        </div>
        @can('users.create')
        <button wire:click="createUser" class="px-4 py-2 bg-primary text-background rounded-lg font-medium hover:bg-primary/90 transition-colors">
            + Add New User
        </button>
        @endcan
    </div>
    
    <!-- Filters -->
    <div class="bg-card rounded-xl border border-primary/15 p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search users..." 
                       class="w-full bg-secondary border border-primary/15 rounded-lg px-4 py-2 text-white placeholder-text-muted focus:border-primary focus:ring-primary">
            </div>
            <div>
                <select wire:model.live="status" class="w-full bg-secondary border border-primary/15 rounded-lg px-4 py-2 text-white focus:border-primary focus:ring-primary">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div>
                <select wire:model.live="roleFilter" class="w-full bg-secondary border border-primary/15 rounded-lg px-4 py-2 text-white focus:border-primary focus:ring-primary">
                    <option value="">All Roles</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select wire:model.live="perPage" class="w-full bg-secondary border border-primary/15 rounded-lg px-4 py-2 text-white focus:border-primary focus:ring-primary">
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                    <option value="100">100 per page</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Users Table -->
    <div class="bg-card rounded-xl border border-primary/15 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-secondary/50 border-b border-primary/15">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-text-muted uppercase tracking-wider cursor-pointer hover:text-white" wire:click="sortBy('name')">
                            User
                            @if($sortField === 'name')
                                <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-text-muted uppercase tracking-wider cursor-pointer" wire:click="sortBy('email')">
                            Email
                            @if($sortField === 'email')
                                <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-text-muted uppercase tracking-wider">Roles</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-text-muted uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-text-muted uppercase tracking-wider cursor-pointer" wire:click="sortBy('created_at')">
                            Joined
                            @if($sortField === 'created_at')
                                <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-text-muted uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-primary/15">
                    @foreach($users as $user)
                    <tr class="hover:bg-primary/5 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <img class="h-8 w-8 rounded-full" src="{{ $user->avatar_url }}" alt="">
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-white">{{ $user->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-text-muted">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-1">
                                @foreach($user->roles as $role)
                                <span class="px-2 py-1 text-xs rounded-full bg-primary/10 text-primary">{{ $role->name }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full {{ $user->is_active ? 'bg-green-500/10 text-green-500' : 'bg-red-500/10 text-red-500' }}">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-text-muted">{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                @can('users.assign_roles')
                                <button wire:click="manageRoles({{ $user->id }})" class="text-primary hover:text-primary/80 transition-colors" title="Manage Roles">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </button>
                                @endcan
                                @can('users.update')
                                <button wire:click="editUser({{ $user->id }})" class="text-blue-500 hover:text-blue-400 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                @endcan
                                @can('users.delete')
                                <button wire:click="confirmDelete({{ $user->id }})" class="text-red-500 hover:text-red-400 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-primary/15">
            {{ $users->links() }}
        </div>
    </div>
    
    <!-- User Modal -->
    @if($showUserModal)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-black/70 transition-opacity" aria-hidden="true" wire:click="$set('showUserModal', false)"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-card rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-primary/15">
                <div class="px-6 pt-6 pb-4">
                    <h3 class="text-lg font-medium text-white">{{ $editingUserId ? 'Edit User' : 'Create User' }}</h3>
                    <div class="mt-4 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-text-muted mb-1">Name</label>
                            <input type="text" wire:model="name" class="w-full bg-secondary border border-primary/15 rounded-lg px-4 py-2 text-white focus:border-primary focus:ring-primary">
                            @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text-muted mb-1">Email</label>
                            <input type="email" wire:model="email" class="w-full bg-secondary border border-primary/15 rounded-lg px-4 py-2 text-white focus:border-primary focus:ring-primary">
                            @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text-muted mb-1">Password</label>
                            <input type="password" wire:model="password" class="w-full bg-secondary border border-primary/15 rounded-lg px-4 py-2 text-white focus:border-primary focus:ring-primary">
                            @error('password') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text-muted mb-1">Confirm Password</label>
                            <input type="password" wire:model="password_confirmation" class="w-full bg-secondary border border-primary/15 rounded-lg px-4 py-2 text-white focus:border-primary focus:ring-primary">
                        </div>
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" wire:model="is_active" class="rounded bg-secondary border-primary/15 text-primary focus:ring-primary">
                                <span class="ml-2 text-sm text-white">Active</span>
                            </label>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text-muted mb-1">Roles</label>
                            <div class="space-y-2 max-h-40 overflow-y-auto">
                                @foreach($roles as $role)
                                <label class="flex items-center">
                                    <input type="checkbox" value="{{ $role->id }}" wire:model="selectedRoles" class="rounded bg-secondary border-primary/15 text-primary focus:ring-primary">
                                    <span class="ml-2 text-sm text-white">{{ $role->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-secondary/50 px-6 py-4 flex justify-end gap-3">
                    <button wire:click="$set('showUserModal', false)" class="px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary/80 transition-colors">
                        Cancel
                    </button>
                    <button wire:click="saveUser" class="px-4 py-2 bg-primary text-background rounded-lg font-medium hover:bg-primary/90 transition-colors">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <!-- Delete Confirmation Modal -->
    @if($showDeleteModal)
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-black/70 transition-opacity" aria-hidden="true" wire:click="$set('showDeleteModal', false)"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-card rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-primary/15">
                <div class="px-6 pt-6 pb-4">
                    <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-500/10 rounded-full mb-4">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-white text-center">Delete User</h3>
                    <p class="text-sm text-text-muted text-center mt-2">Are you sure you want to delete this user? This action cannot be undone.</p>
                </div>
                <div class="bg-secondary/50 px-6 py-4 flex justify-end gap-3">
                    <button wire:click="$set('showDeleteModal', false)" class="px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary/80 transition-colors">
                        Cancel
                    </button>
                    <button wire:click="deleteUser" class="px-4 py-2 bg-red-500 text-white rounded-lg font-medium hover:bg-red-600 transition-colors">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>