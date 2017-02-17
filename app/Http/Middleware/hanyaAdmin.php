<?php

namespace App\Http\Middleware;

use Closure;

class hanyaAdmin
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

        $level = auth()->user()->ref_user_level_id;
        if($level != 1){
            abort(404);
        }

        return $next($request);
    }
}
