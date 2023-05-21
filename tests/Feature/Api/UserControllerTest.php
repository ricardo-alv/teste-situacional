<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_endpoint_users_all()
    {
        /** Testando end point users passando o token de acesso e listando todos usuarios
         *  cadastrado no banco de dados verificando o status se é 200 e se tem a posicao users no retorno do json
         *  **/

        $token = $this->getJson('/api/auth')['access_token'];

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->json('get', '/api/users');

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) {
            $json->has('users');
        });
    }

    public function test_get_endpoint_users_one()
    {

        /** Testando end point users passando o token de acesso e listando apenas um usuario
         *  cadastrado conforme é informado o id do mesmo . É verificado os dados de retorno
         * se existe  e se o status é 200;
         *  **/
        $token = $this->getJson('/api/auth')['access_token'];

        $user = User::find(1);

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->json('get', '/api/users/' . $user->id);

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use ($user) {

            $json->has('user');

            $json->hasAll([
                'user.id',
                'user.name',
                'user.email',
            ]);

            $json->whereAll([
                "user.id" => $user->id,
                "user.name" => $user->name,
                "user.email" =>  $user->email,
            ]);
        });
    }
}
