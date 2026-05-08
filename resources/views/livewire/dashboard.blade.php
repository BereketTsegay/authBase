<div>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white">Dashboard</h1>
        <p class="text-text-muted mt-2">Welcome back, {{ auth()->user()->name }}!</p>
    </div>
    
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-8">
        <div class="bg-card rounded-xl border border-primary/15 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 bg-primary/10 rounded-lg">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <span class="text-2xl font-bold text-white">{{ $statistics['total_users'] }}</span>
            </div>
            <h3 class="text-sm font-medium text-text-muted">Total Users</h3>
            <p class="text-xs text-green-500 mt-2">+{{ $statistics['new_users_today'] }} today</p>
        </div>
        
        <div class="bg-card rounded-xl border border-primary/15 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 bg-primary/10 rounded-lg">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <span class="text-2xl font-bold text-white">{{ $statistics['total_roles'] }}</span>
            </div>
            <h3 class="text-sm font-medium text-text-muted">Roles</h3>
        </div>
        
        <div class="bg-card rounded-xl border border-primary/15 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 bg-primary/10 rounded-lg">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <span class="text-2xl font-bold text-white">{{ $statistics['total_teams'] }}</span>
            </div>
            <h3 class="text-sm font-medium text-text-muted">Teams</h3>
        </div>
        
        <div class="bg-card rounded-xl border border-primary/15 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 bg-primary/10 rounded-lg">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </div>
                <span class="text-2xl font-bold text-white">{{ $statistics['total_permissions'] }}</span>
            </div>
            <h3 class="text-sm font-medium text-text-muted">Permissions</h3>
        </div>
        
        <div class="bg-card rounded-xl border border-primary/15 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 bg-primary/10 rounded-lg">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-2xl font-bold text-white">{{ $statistics['active_sessions'] }}</span>
            </div>
            <h3 class="text-sm font-medium text-text-muted">Active Sessions</h3>
        </div>
        
        <div class="bg-card rounded-xl border border-primary/15 p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-2 bg-primary/10 rounded-lg">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <span class="text-2xl font-bold text-white">{{ number_format($statistics['total_users'] - $statistics['new_users_today'], 0) }}</span>
            </div>
            <h3 class="text-sm font-medium text-text-muted">Active Users</h3>
        </div>
    </div>
    
    <!-- Recent Activities -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-card rounded-xl border border-primary/15">
            <div class="p-6 border-b border-primary/15">
                <h2 class="text-lg font-semibold text-white">Recent Activities</h2>
            </div>
            <div class="divide-y divide-primary/15">
                @foreach($recentActivities as $activity)
                <div class="p-4 hover:bg-primary/5 transition-colors">
                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                                <span class="text-primary text-xs">
                                    @if($activity->log_name === 'users')
                                        👤
                                    @elseif($activity->log_name === 'roles')
                                        🔒
                                    @else
                                        📝
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-white">
                                {{ $activity->description }} by 
                                <span class="font-medium text-primary">
                                    {{ $activity->causer?->name ?? 'System' }}
                                </span>
                            </p>
                            <p class="text-xs text-text-muted mt-1">
                                {{ $activity->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- User Growth Chart -->
        <div class="bg-card rounded-xl border border-primary/15 p-6">
            <h2 class="text-lg font-semibold text-white mb-4">User Growth (Last 30 Days)</h2>
            <div class="space-y-4">
                @foreach($userGrowth as $data)
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-text-muted">{{ $data->date }}</span>
                        <span class="text-white">{{ $data->count }} users</span>
                    </div>
                    <div class="w-full bg-primary/10 rounded-full h-2">
                        <div class="bg-primary rounded-full h-2 transition-all duration-500" 
                             style="width: {{ ($data->count / max($userGrowth->pluck('count')->max(), 1)) * 100 }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>