<?php

namespace App\Traits;

use App\Models\Team;
use App\Models\User;

trait HasTeams
{
    /**
     * Get all teams the user belongs to
     * Renamed from teams() to userTeams() to avoid conflict with Spatie's teams()
     */
    public function userTeams()
    {
        return $this->belongsToMany(Team::class, 'team_user')
                    ->withPivot('role', 'permissions')
                    ->withTimestamps();
    }

    /**
     * Get teams owned by the user
     */
    public function ownedTeams()
    {
        return $this->hasMany(Team::class, 'owner_id');
    }

    /**
     * Get the user's current team
     */
    public function currentTeam()
    {
        return $this->belongsTo(Team::class, 'current_team_id');
    }

    /**
     * Switch the user's current team
     */
    public function switchTeam(Team $team): bool
    {
        if (!$this->belongsToTeam($team)) {
            return false;
        }

        $this->current_team_id = $team->id;
        $this->save();

        return true;
    }

    /**
     * Check if user belongs to a specific team
     */
    public function belongsToTeam(Team $team): bool
    {
        return $this->userTeams->contains($team);
    }

    /**
     * Check if user owns a specific team
     */
    public function ownsTeam(Team $team): bool
    {
        return $this->id === $team->owner_id;
    }

    /**
     * Get all teams the user is a member of (alias for userTeams)
     */
    public function getTeamsAttribute()
    {
        return $this->userTeams;
    }

    /**
     * Get the user's role in a specific team
     */
    public function getTeamRole(Team $team): ?string
    {
        $membership = $this->userTeams()->where('team_id', $team->id)->first();
        return $membership ? $membership->pivot->role : null;
    }

    /**
     * Get team-specific permissions for the user
     */
    public function getTeamPermissions(Team $team): array
    {
        $membership = $this->userTeams()->where('team_id', $team->id)->first();
        return $membership && $membership->pivot->permissions 
            ? json_decode($membership->pivot->permissions, true) 
            : [];
    }

    /**
     * Set the user's role in a specific team
     */
    public function setTeamRole(Team $team, string $role): void
    {
        $this->userTeams()->syncWithoutDetaching([
            $team->id => ['role' => $role]
        ]);
    }

    /**
     * Remove user from a team
     */
    public function removeFromTeam(Team $team): void
    {
        $this->userTeams()->detach($team->id);
    }

    /**
     * Invite user to a team
     */
    public function inviteToTeam(Team $team, string $role = 'member'): void
    {
        if (!$this->belongsToTeam($team)) {
            $this->userTeams()->attach($team->id, ['role' => $role]);
        }
    }

    /**
     * Get all users in the same teams as this user
     */
    public function getTeamMembers(): \Illuminate\Support\Collection
    {
        $teamIds = $this->userTeams->pluck('id');
        return User::whereHas('userTeams', function ($query) use ($teamIds) {
            $query->whereIn('team_id', $teamIds);
        })->get();
    }
}