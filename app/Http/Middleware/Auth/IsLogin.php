<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsLogin
{
    public function handle(Request $request, Closure $next, string $role = null)
    {
        // مش مسجل دخول
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        // لو محدد role ومش مطابق
        if ($role && $userRole !== $role) {
            // يوجهه لصفحته الصح
            if ($userRole === 'admin') {
                return redirect()->route('admin');
            }

            return redirect()->route('home');
        }

        return $next($request);
    }
}
