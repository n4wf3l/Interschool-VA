<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamleaderMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check if user is authenticated in the request and if its a teamleader
        if ($request->user() && $request->user()->player && $request->user()->player->teamleader == 1) {
            return $next($request); //request is allowed to proceed if user is a teamleader
        } else
            return redirect()->back(); //back to the previous page if user is not teamleader          

    }


}
