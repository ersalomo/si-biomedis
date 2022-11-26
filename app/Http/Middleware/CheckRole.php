<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $roles = [
            'superadmin' => [1],
            'admin' => [2, 1],
            'dokter' => [3, 1],
        ];
        $role_id = $roles[$role] ?? [];
        if (in_array(auth()->user()->role, $role_id)) {
            return $next($request);
        }
        return abort(403);
    }
}
