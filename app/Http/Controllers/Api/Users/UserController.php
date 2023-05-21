<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/users",
     *     tags={"Users"},    
     *     summary="Retornando todos os usuários cadastrado no banco de dados", 
     *     security={{"bearerAuth":{}}}, 
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     *
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'users' => $users
        ], 200);
    }

    /**
     * @OA\Get(
     *     path="/api/users/{id}",
     *     security={{"bearerAuth":{}}}, 
     *  @OA\Parameter(
     *         description="Parametro id usuário",
     *         in="path",
     *         name="id",
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="int", value="1", summary="id usuário")
     *     ),
     *     tags={"Users"},
     *     summary="Retornando apenas um usuário especifico informado pelo id caso não tenha retorna vazio", 
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     *
     */

    public function show($id)
    {
        $user = User::find($id);

        return response()->json([
            'user' => $user
        ], 200);
    }
}
