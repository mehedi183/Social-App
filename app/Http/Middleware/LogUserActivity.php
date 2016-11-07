<?php

namespace App\Http\Middleware;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Cache;

use Closure;
use Carbon\Carbon;

class LogUserActivity
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
        if(Auth::check())
        {
            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put('user_online_'.Auth::user()->id, true, $expiresAt);
        }
        return $next($request);
    }
}
