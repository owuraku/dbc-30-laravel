<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Bouncer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $age = $request->query("age");

        if ($age < 16){
            // abort(400);
            return response('You are less than 16 and therefore don not qualify to view this page');
        }
        return $next($request);
    }
}
