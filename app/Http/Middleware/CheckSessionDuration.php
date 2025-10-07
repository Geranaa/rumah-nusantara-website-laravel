<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CheckSessionDuration
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $loginTime = Session::get('login_time');
            if ($loginTime) {
                $now = Carbon::now();
                $login = Carbon::parse($loginTime);
                if ($now->diffInMinutes($login) > 1) {
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect()->route('login')->with('error', 'Sesi Anda telah kedaluwarsa.');
                }
            } else {
                Session::put('login_time', Carbon::now());
            }
        }

        return $next($request);
    }
}
