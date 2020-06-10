<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Gate::denies('is_admin')) return redirect(route('home'));

        return $next($request);
    }
}
