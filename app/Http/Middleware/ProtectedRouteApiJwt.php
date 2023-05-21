<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\TokenJwt;

class ProtectedRouteApiJwt
{  
    /** Middleware criado para verificar o token
     *  passado pelo header em cada requisição. **/

    public function handle(Request $request, Closure $next)
    {
        $jwt = new TokenJwt;
        $token = $request->header("authorization");  
     
        if (!$token || !$jwt->verifyToken($token)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
