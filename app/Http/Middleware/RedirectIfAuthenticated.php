<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        if (session()->get('vai_tro') == 1 || session()->get('vai_tro') == 2) {
            return redirect()->route('trang-chu');
        } else {
            return redirect()->route('trang-chu-client');
        }
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect()->route('trang-chu');
            }
        }

        return $next($request);
    }
}
