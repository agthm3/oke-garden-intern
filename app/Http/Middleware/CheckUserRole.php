<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (!$user || !in_array($user->role, ['Designer', 'Gardener'])) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
