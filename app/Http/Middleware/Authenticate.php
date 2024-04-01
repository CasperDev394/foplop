<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo(\Illuminate\Http\Request $request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
