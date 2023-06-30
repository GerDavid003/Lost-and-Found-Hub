<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventBrowserBackHistory
{
    /**
     * Handle an incoming request.
     *@param  \Illuminate\Http\Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /* 
   This is the function that prevents logging back to a session by pressing back
*/
       $response = $next($request);
       $response->headers->set('Cache-Control','no-cache,no-store, max-age=0, must-revalidate');
       $response->headers->set('Pragma','no-cache');
       $response->headers->set('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
       return $response;

    }
}
