<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentSubscribed
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
        if (auth()->user()->subscribed == 0) {
            return redirect()->route('student.subscription.step1');
        }

        return $next($request);
    }
}
