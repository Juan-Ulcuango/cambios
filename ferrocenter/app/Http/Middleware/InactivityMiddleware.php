<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class InactivityMiddleware
{
    public function handle($request, Closure $next)
    {
        $timeout = config('session.lifetime') * 60; // tiempo en segundos

        $lastActivity = session('lastActivityTime');
        if (time() - $lastActivity > $timeout) {
            Auth::logout();
            return redirect('/login')->with('message', 'You have been logged out due to inactivity.');
        }

        session(['lastActivityTime' => time()]);

        return $next($request);
    }
}

