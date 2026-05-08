<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeamScope
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->currentTeam) {
            session(['current_team' => auth()->user()->currentTeam]);
        }
        
        return $next($request);
    }
}