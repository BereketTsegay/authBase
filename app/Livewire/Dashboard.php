<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use App\Models\Team;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $statistics = [];
    public $recentActivities = [];
    public $userGrowth = [];

    public function mount()
    {
        $this->loadStatistics();
        $this->loadRecentActivities();
        $this->loadUserGrowth();
    }

    public function loadStatistics()
    {
        $this->statistics = [
            'total_users' => User::count(),
            'total_roles' => Role::count(),
            'total_teams' => Team::count(),
            'active_sessions' => DB::table('login_histories')->where('is_active', true)->count(),
            'new_users_today' => User::whereDate('created_at', today())->count(),
            'total_permissions' => DB::table('permissions')->count(),
        ];
    }

    public function loadRecentActivities()
    {
        $this->recentActivities = ActivityLog::with('causer')
            ->latest()
            ->limit(10)
            ->get();
    }

    public function loadUserGrowth()
    {
        $this->userGrowth = User::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard')
            ->layout('layouts.admin');
    }
}