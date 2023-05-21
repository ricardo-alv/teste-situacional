<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        /** Retornando a todos os usuários cadastrado no banco de dados **/

        $users = User::all();

        return response()->json([
            'users' => $users
        ], 200);
    }

    public function show($id)
    {
        /** Retornando apenas um usuário especifico informado pelo id 
         * caso não tenha retorna vazio **/

        $user = User::find($id);

        return response()->json([
            'user' => $user
        ], 200);
    }
}
