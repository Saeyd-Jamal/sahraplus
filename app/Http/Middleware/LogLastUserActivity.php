<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogLastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // حدث فقط لو مرت 5 دقائق على آخر نشاط
            if (now()->diffInMinutes($user->last_activity ?? now()) > 5) {
                $user->update(['last_activity' => now()]);
            }
        }

        return $next($request);
    }
}
