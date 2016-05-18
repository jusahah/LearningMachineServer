<?php

namespace App\Http\Middleware;

use Closure;
use App\Sequence;

class OwnerOfSequence
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
        $sequence = $request->route('sequence');      

        if ($sequence->user_id == \Auth::id()) {
            return $next($request);
        } else {
            return \Response::json([
                'code' => 401,
                'message' => 'Not owner of sequence'
            ], 401);
        }


        
    }
}
