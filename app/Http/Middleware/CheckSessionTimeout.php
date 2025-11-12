<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckSessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $lastActivity = session('lastActivityTime');
            $timeout = 3600;

            if ($lastActivity && (Carbon::now()->timestamp - $lastActivity > $timeout)) {
                Auth::logout();
                session()->flush();
                return redirect('login')->with('message', 'Your session has expired. Please login again.');
            }

            session(['lastActivityTime' => Carbon::now()->timestamp]);
        }

        return $next($request);
    }
}
