<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    Auth\AuthController,
    Users\UserController
};

Route::middleware(['jwt'])->group(function () {
    Route::apiResources([
        'users' => UserController::class
    ]);
});

/** Rota auth criada para gerar um token de acesso de 24hr **/
Route::apiResources([
    'auth' => AuthController::class
]);
