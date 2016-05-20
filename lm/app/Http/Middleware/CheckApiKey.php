<?php

namespace App\Http\Middleware;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Closure;

use App\User;
use DB;

class CheckApiKey
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
        $key = $request->route('apiKey');
        if (!$key || $key == '') {
            return \Response::json([
                'result' => 'API key missing'
            ], 403);            
        }

        try {
            // Key is saved in crypted form
            $keyRow = \DB::table('api_keys')->where('key', $key)->firstOrFail();


        }catch(ModelNotFoundException $e) {
            return \Response::json([
                'result' => 'Invalid API key'
            ], 403);
        }

        $request->attributes->add(['user' => $user]);
        $authResponse = \Auth::onceBasic();

        return \Auth::onceBasic() ?: $next($request);
    }
}
