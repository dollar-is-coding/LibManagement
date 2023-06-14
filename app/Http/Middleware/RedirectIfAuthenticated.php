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
        
            $user = $request->user();
            if ($user && $user->vai_tro === 1) { // Assuming 'user' role has id 1
                return redirect()->route('trang-chu');
            } else  if ($user && $user->vai_tro === 2) { // Assuming 'user' role has id 1
                return redirect()->route('trang-chu');
            } else if ($user && $user->vai_tro === 3) { 
                return redirect()->route('trang-chu-client');
            }
            else{
                return $next($request);
            }
    }
}
