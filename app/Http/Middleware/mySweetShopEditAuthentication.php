<?php

namespace App\Http\Middleware;

use App\Models\Shop;
use Closure;
use Illuminate\Http\Request;

class mySweetShopEditAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $uniqueId = basename($request->url());
        $shop = Shop::whereUniqueId($uniqueId)->first();
        if(is_null($shop)) {
            if (! $request->expectsJson())
                return abort(404);
            else
                return response()->json(['message' => "this shop id not exist"]);

        }
        $found = false;
        foreach(auth()->user()->shops as $shop)
            if($shop->unique_id == $uniqueId){
                $found = true;
                break;
            }

        if($found) {
            $request->headers->set('shop_id', $uniqueId);
            return $next($request);
        }
        else {
            if (! $request->expectsJson())
                    return abort(401);
            else
                return response()->json(['message' => "you are not authorized"]);
        }
    }
}
