<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isOwner
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
            if (auth()->user()->roles == 'owner' || auth()->user()->roles == 'kasir' || auth()->user()->roles == 'admin') {
                return $next($request);
            }
            abort(403);
        } else {
            return redirect('/login');
        }
    }
}