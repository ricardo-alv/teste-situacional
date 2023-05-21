<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\TokenJwt;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /** Criando e retornando token validado por 24hr **/

    private $jwt;

    public function __construct(TokenJwt $jwt)
    {
        $this->jwt = $jwt;
    }

    public function index()
    {
        $token =  $this->jwt->generateToken();

        return response()->json([
            'access_token' => $token,
            'type' => 'Bearer'
        ], 200);
    }
}
