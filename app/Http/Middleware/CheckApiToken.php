<?php

namespace App\Http\Middleware;

use Closure;

class CheckApiToken 
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
		//wUztFHjrnYlVwWKcsiixE5uONrs1Gj4wzKT4IVKa
		
			
			if(!empty(trim($request->get('api_token')))){
			$is_exists = ( $request->get('api_token') == 'test_api11')? 1 : 0;
			//$is_exists = User::where('id' , Auth::guard('api')->id())->exists();
				if($is_exists){
					return $next($request);
				}
			}
        return response()->json('Invalid Token', 401);
		
        //return $next($request);
    }
}
