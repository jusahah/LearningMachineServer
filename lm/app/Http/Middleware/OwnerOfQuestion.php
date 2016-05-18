<?php

namespace App\Http\Middleware;

use Closure;

class OwnerOfQuestion
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
        $question = $request->route('question');    

        if ($question->user_id == \Auth::id()) {
            return $next($request);
        } else {
            return \Response::json([
                'code' => 401,
                'message' => 'Not owner of question'
            ], 401);
        }
    }
}
