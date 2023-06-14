<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if ($user && $user->vai_tro === 3) { // Assuming 'user' role has id 1
            return $next($request);
        }
        if (!$request->expectsJson()) {
            return
            redirect()->route('dang-nhap');
        }
        // return redirect()->route('dang-nhap');
    } 
}
