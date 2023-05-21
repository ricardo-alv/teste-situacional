<?php

namespace App\Services;

use Exception;
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class TokenJwt
{
    /** Classe para criar e verificar token jwt **/
    private $key = "3152a7ea-26b9-4390-bf22-ec53f12b5449";

    public function generateToken()
    {
        $payload = array(
            "iss" => url('/'),
            "iat" => "",
            "data" => "",
            "exp" => now()->addHours(24)->timestamp
        );

        return  JWT::encode($payload, $this->key, 'HS256');
    }

    public function verifyToken($token)
    {
        /** Decodificando token e verificando se é Bearer **/

        $token =  explode(" ", $token);

        if (count($token) == 1 || isset($token[0]) && $token[0] !== 'Bearer') {
            return false;
        }

        $token = $token[1];

        try {
            $jwt =  JWT::decode($token, new Key($this->key, 'HS256'));
            return   $data = (array) $jwt;
        } catch (Exception $e) {
            return false;
        }
    }
}
