<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->routeIs('author.*')) {
                session()->flash('error', 'Login terlebih dahulu');
                return route('auth.index', [
                    'fail' => true,
                    'returnUrl' => URL::full()
                ]);
            }
        }
    }
}
