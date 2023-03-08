<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isKasir
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->roles == 'Kasir' || auth()->user()->roles == 'Admin') {
                return $next($request);
            }
            abort(403, 'Kamu tidak memiliki hak akses');
        } else {
            return redirect('/login');
        }
    }
}
