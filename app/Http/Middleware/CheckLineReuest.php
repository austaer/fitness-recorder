<?php

namespace App\Http\Middleware;

use Closure;
use LINE\LINEBot\Constant\HTTPHeader;
use Log;

class CheckLineReuest
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
        $signature = request()->header(HTTPHeader::LINE_SIGNATURE);
        if (empty($signature)) {
            return response('Bad Request', 400);
        }
        $request->attributes->add([HTTPHeader::LINE_SIGNATURE => $signature]);
        return $next($request);
    }
}
