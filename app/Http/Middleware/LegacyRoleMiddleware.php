<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;

class LegacyRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $roles = is_array($role)
            ? $role
            : explode('|', $role);

        if (!Auth::user()->hasAnyRole($roles)) {
            return redirect('/');
        }

        return $next($request);
    }
}
