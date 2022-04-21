<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Technician
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
        $roles = Auth::user()->roles->pluck('role')->toArray();

        if (in_array('technician', $roles)) {
            return $next($request);
        } elseif (in_array('admin', $roles)) {
            return redirect('admin');
        } elseif (in_array('student', $roles)) {
            return redirect('student');
        } elseif (in_array('standBy', $roles)) {
            return redirect('standBy');
        }
    }
}
