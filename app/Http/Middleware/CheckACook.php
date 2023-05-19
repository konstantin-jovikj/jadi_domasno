<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckACook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || $request->user()->role_id !== 2) {
            if($request->user()->role_id == 3){
                return redirect()->route('homepage');
            }
            if($request->user()->role_id == 1){
                return redirect()->route('dashboard');
            }
            // abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
