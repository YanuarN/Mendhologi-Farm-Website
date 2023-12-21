<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $guard = session('guard', 'web');  // Ambil informasi guard dari session

        if (Auth::guard($guard)->check()) {
            if ($guard === 'admin') {
                return redirect('/admin');
            } elseif ($guard === 'web') {
                return redirect('/');
            }
        }


        return $next($request);
    }
}
