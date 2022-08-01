<?php

namespace App\Http\Controllers;

use App\Classes\Geral;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class comentarioController extends Controller
{
    private Geral $geral;
    private string $apiToken;
    private string $urlUsuarios;
    private string $urlPosts;
    private string $urlComentarios;

    public function __construct()
    {
        $this->geral = new Geral;
        $this->apiToken     = $this->geral->getApiToken();
        $this->urlUsuarios  = $this->geral->getUrlUsuarios();
        $this->urlPosts  = $this->geral->getUrlPosts();
        $this->urlComentarios  = $this->geral->getUrlComentarios();
    }

    /**
     * Obtem lista de comentários
     * @return array
     */
    private function getComentarios(): array
    {
        try {
            $response = Http::withToken($this->apiToken)->get($this->urlComentarios);
            if($response->successful()){
                return $response->json();
            } else {
                abort(500);
            }
        } catch (\Exception $e){
            Log::error($e);
            abort(500);
        }
    }


    /**
     * Envia a lista de comentários para view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function lista()
    {
        return view('listas.comentarios',[
            'comentarios' => $this->getComentarios()
        ]);
    }

    /**
     * Cadastra comentário para um post específico
     * @param int $postId
     * @param Faker $faker
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function cadastrar(int $postId, Faker $faker)
    {
        // Verifica se existe um post com o id informado
        $response = Http::withToken($this->apiToken)->get($this->urlPosts . $postId);

        if($response->status()===200){
            $response = Http::withToken($this->apiToken)->post($this->urlComentarios,[
                'post_id'   => $postId,
                'name'      => $faker->name,
                'email'     => $faker->email,
                'body'      => $faker->text,
            ]);

            $novoComentario = json_decode($response->body());
            Session::put('novoComentario',$novoComentario);

            return view('etapas.etapa4',[
                'novoUsuario' => Session::get('novoUsuario'),
                'novoPost' => Session::get('novoPost'),
                'novoComentario' => Session::get('novoComentario'),
            ]);
        } else {
            abort(500);
        }

    }

    /**
     * Cadastra comentário para primeiro post
     *
     * Obs.: Criei esse método separadamente somente para passar o conteúdo do novo post para a view,
     * mas em situações reais, seria mais plausível utilizar o método cadastrar() e tratar o retorno da view de forma dinâmica
     *
     * @param int $primPostId
     * @param Faker $faker
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function cadastrarPrimeiroPost(int $primPostId, Faker $faker)
    {
        // Verifica se existe um post com o id informado
        $response = Http::withToken($this->apiToken)->get($this->urlPosts . $primPostId);

        if($response->status()===200){
            $response = Http::withToken($this->apiToken)->post($this->urlComentarios,[
                'post_id'   => $primPostId,
                'name'      => $faker->name,
                'email'     => $faker->email,
                'body'      => $faker->text,
            ]);

            $novoComentarioPrimPost = json_decode($response->body());
            Session::put('novoComentarioPrimPost',$novoComentarioPrimPost);

            return view('etapas.etapa6',[
                'novoUsuario' => Session::get('novoUsuario'),
                'novoPost' => Session::get('novoPost'),
                'novoComentario' => Session::get('novoComentario'),
                'primeiroPost' => Session::get('primeiroPost'),
                'novoComentarioPrimPost' => Session::get('novoComentarioPrimPost'),
            ]);
        } else {
            abort(500);
        }
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
        return view('listas.comentarios',[
            'comentarios' => $this->getComentarios(),
            'retorno' => $response,
        ]);
    }
}
