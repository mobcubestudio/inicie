<?php

namespace App\Http\Controllers;

use App\Classes\Geral;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\throwException;
use Faker\Generator as Faker;


class usuarioController extends Controller
{

    private Geral $geral;
    private string $apiToken;
    private string $urlUsuarios;

    public function __construct()
    {
        $this->geral = new Geral;
        $this->apiToken     = $this->geral->getApiToken();
        $this->urlUsuarios  = $this->geral->getUrlUsuarios();
    }

    /**
     * Retorna a lista de usuários da api
     * @return array
     */
    public function getUsuarios(): array
    {
        try {
            $response = Http::withToken($this->apiToken)->get($this->urlUsuarios);

            if($response->successful()){
                return $response->json();
            } else {
                abort(500);
            }
            return $retorno;
        } catch (\Exception $e){
            Log::error($e);
            abort(500);
        }
    }


    /**
     * retorna a view com a primeira etapa do teste
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('etapas.etapa1');
    }


    /**
     * Envia a lista de usuários para view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function lista()
    {
        return view('listas.usuarios',[
            'usuarios' => $this->getUsuarios()
        ]);
    }


    /**
     * Cadastra novo usuário na api
     * @param Request $request
     * @return void
     */
    public function cadastrar(Faker $faker)
    {
        $response = Http::withToken($this->apiToken)->post($this->urlUsuarios,[
            'name' => $faker->name,
            'email' => $faker->email,
            'gender' => 'male',
            'status' => 'active',
        ]);

        $novoUsuario = json_decode($response->body());
        Session::put('novoUsuario',$novoUsuario);

        return view('etapas.etapa2',[
            'novoUsuario' => Session::get('novoUsuario')
        ]);



    }


    /**
     * Exclui dados da api com vaidação de url e status de retorno
     * @param string $model
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function delete(string $model, int $id)
    {
        $response = $this->geral->delete(
            id: $id,
            model: $model,
        );

        // RETORNA A VIEW INICIAL
        return view('listas.usuarios',[
            'usuarios' => $this->getUsuarios(),
            'retorno' => $response,
        ]);
    }
}
