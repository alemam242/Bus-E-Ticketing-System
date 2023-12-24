<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RouteValidator
{
    public function handle(Request $request, Closure $next): Response
    {
        $currentRouteName = request()->route()->getName();

        if (!Session::has('user')) {
            return $next($request);
        }

        return redirect()->route('user.login');
    }
}
