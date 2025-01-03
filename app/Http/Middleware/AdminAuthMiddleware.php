<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    if (!session()->has('admin_id')) {
        return redirect()->route('login.lvslog')->withErrors(['error' => 'Bạn phải đăng nhập để truy cập.']);
    }
    return $next($request);
}

}
