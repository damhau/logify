<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use \Landlord;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
        {
            $logify_id = Auth::user()->logify_id;
            #dd($request->user());
            Landlord::addTenant('logify_id', $logify_id);
            return $next($request);
        }
    }
}
