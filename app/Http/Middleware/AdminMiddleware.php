<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check if user is authenticated in the request and if its an admin
        if ($request->user() && $request->user()->admin == 1) {
            return $next($request); //request is allowed to proceed if user is admin
        }

        abort(403); //non-admins are refused
    }
}
