<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel RBAC') }} - Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-background font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 z-20 flex flex-col w-64 bg-secondary/95 backdrop-blur-sm border-r border-primary/15">
            <div class="flex items-center justify-between h-16 px-4 border-b border-primary/15">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-primary rounded-lg"></div>
                    <span class="text-lg font-bold text-white">{{ config('app.name') }}</span>
                </div>
            </div>
            
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
                
                @can('users.view')
                <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span>Users</span>
                </a>
                @endcan
                
                @can('roles.view')
                <a href="{{ route('roles.index') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span>Roles</span>
                </a>
                @endcan
                
                @can('permissions.view')
                <a href="{{ route('permissions.index') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                    <span>Permissions</span>
                </a>
                @endcan

                @can('inventory.view')
                <a href="{{ route('inventory.dashboard') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V5a2 2 0 00-2-2H6a2 2 0 00-2 2v8m16 0l-8 8-8-8"/>
                    </svg>
                    <span>Inventory</span>
                </a>
                @endcan

                @can('products.view')
                <a href="{{ route('inventory.products.index') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V5a2 2 0 00-2-2H6a2 2 0 00-2 2v8m16 0l-8 8-8-8"/>
                    </svg>
                    <span>Products</span>
                </a>
                @endcan

                @can('warehouses.view')
                <a href="{{ route('inventory.warehouses.index') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l9-4 9 4v11a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>
                    </svg>
                    <span>Warehouses</span>
                </a>
                @endcan

                @can('suppliers.view')
                <a href="{{ route('inventory.suppliers.index') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 10-8 0 4 4 0 008 0zm-5 4h2m1 8H8a4 4 0 00-4 4h12a4 4 0 00-4-4z"/>
                    </svg>
                    <span>Suppliers</span>
                </a>
                @endcan

                @can('purchases.view')
                <a href="{{ route('inventory.purchases.index') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a1 1 0 011-1h4a1 1 0 011 1v6m-4-12h.01M12 5h0M9 21h6"/>
                    </svg>
                    <span>Purchases</span>
                </a>
                @endcan

                @can('sales.view')
                <a href="{{ route('inventory.sales.index') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Sales</span>
                </a>
                @endcan

                @can('reports.inventory')
                <a href="{{ route('inventory.reports.index') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18"/>
                    </svg>
                    <span>Reports</span>
                </a>
                @endcan

                @can('teams.view')
                <a href="{{ route('teams.index') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>Teams</span>
                </a>
                @endcan
                
                @can('audits.view')
                <a href="{{ route('audits.index') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                    <span>Audit Logs</span>
                </a>
                @endcan
                
                @can('settings.manage')
                <a href="{{ route('settings.index') }}" class="flex items-center gap-3 px-3 py-2 text-text-muted hover:text-white rounded-lg transition-all duration-200 hover:bg-primary/10 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Settings</span>
                </a>
                @endcan
            </nav>
            
            <div class="p-4 border-t border-primary/15">
                <div class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/5">
                    <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-8 h-8 rounded-full">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-text-muted truncate">{{ auth()->user()->email }}</p>
                    </div>
                    <button onclick="Livewire.dispatch('logout')" class="p-1 hover:bg-primary/10 rounded-lg transition-colors">
                        <svg class="w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 ml-64 overflow-y-auto">
            <div class="p-8">
                {{ $slot }}
            </div>
        </main>
    </div>
    
    <!-- Notification Container -->
    <div x-data="notifications()" x-init="init()" class="fixed bottom-4 right-4 z-50 space-y-2">
        <template x-for="notification in notifications" :key="notification.id">
            <div x-show="visible" x-transition.duration.300ms 
                 class="bg-card border border-primary/15 rounded-lg shadow-lg p-4 min-w-[320px]"
                 :class="{
                     'border-green-500/50': notification.type === 'success',
                     'border-red-500/50': notification.type === 'error',
                     'border-blue-500/50': notification.type === 'info'
                 }">
                <div class="flex items-center gap-3">
                    <div x-show="notification.type === 'success'" class="text-green-500">✓</div>
                    <div x-show="notification.type === 'error'" class="text-red-500">✗</div>
                    <div x-show="notification.type === 'info'" class="text-blue-500">ℹ</div>
                    <p class="text-sm text-white" x-text="notification.message"></p>
                </div>
            </div>
        </template>
    </div>
    
    @livewireScripts
    <script>
        function notifications() {
            return {
                notifications: [],
                visible: true,
                init() {
                    window.addEventListener('notify', event => {
                        this.addNotification(event.detail);
                    });
                },
                addNotification(notification) {
                    const id = Date.now();
                    this.notifications.push({ ...notification, id });
                    setTimeout(() => {
                        this.notifications = this.notifications.filter(n => n.id !== id);
                    }, 5000);
                }
            }
        }
    </script>
</body>
</html>