<?php

namespace App\Http\Middleware;

use Closure;

class ServiceKey
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
          if (!$request->has("api_key")) {
               return response()->json([
                  'status' => 401,
                  'message' => 'Acceso no autorizado',
               ], 401);
          }

         if ($request->has("api_key")) {
          $secret = "kvYRMCNHbyjhwq3qmVU5fHfhwUhzbIgXG4Yy0tgc";
          if ($request->input("api_key") != $secret) {
             return response()->json([
               'status' => 401,
               'message' => 'Acceso no autorizado',
             ], 401);
          }
         }

         return $next($request);
    }
}
