<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Check if the user's role is one of the allowed roles
        if (!in_array($user->role, $roles)) {
            return redirect()->route('login')->with('error', 'Unauthorized Access');
        }

        return $next($request);
    }
}
