<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckDeviceType
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
        $userAgent = $request->userAgent();
        if (strpos($userAgent, 'Web') !== false) {
            $request->device_type = 'web';
        } else {
            $request->device_type = 'mobile';
        }
        return $next($request);
    }
}
