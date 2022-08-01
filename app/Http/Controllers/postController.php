<?php

namespace App\Http\Controllers;

use App\Classes\Geral;
use Illuminate\Support\Facades\Http;

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class postController extends Controller
{
    private Geral $geral;
    private string $apiToken;
    private string $urlUsuarios;
    private string $urlPosts;

    public function __construct()
    {
        $this->geral = new Geral;
        $this->apiToken     = $this->geral->getApiToken();
        $this->urlPosts  = $this->geral->getUrlPosts();
        $this->urlUsuarios  = $this->geral->getUrlUsuarios();
    }

    /**
     * Retorna a lista de todos os posts ou de um usuário da api
     * @param int|null $idUsuario
     * @return array
     */
    private function getPosts(int|null $idUsuario=null): array
    {
        try {
            $response = Http::withToken($this->apiToken)->get($this->urlPosts . $idUsuario);
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
     * obtem lista de posts
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function lista()
    {
        $posts = $this->getPosts();

        return view('listas.posts',[
            'posts' => $posts
        ]);
    }


    /**
     * Obtem o primeiro post da lista pública
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function primeiroPost()
    {
        $posts = $this->getPosts();
        sort($posts);
        $primeiroPost = $posts[0];
        $primeiroPost = json_encode($primeiroPost);

        Session::put('primeiroPost',json_decode($primeiroPost));



        return view('etapas.etapa5',[
            'novoUsuario' => Session::get('novoUsuario'),
            'novoPost' => Session::get('novoPost'),
            'novoComentario' => Session::get('novoComentario'),
            'primeiroPost' => Session::get('primeiroPost'),
        ]);
    }



    /**
     * Cadastra novo post na api
     * @param array $request
     * @return void
     */
    public function cadastrar(int $userId,Faker $faker)
    {
        // Verifica se existe um usuário com o id informado
        $response = Http::withToken($this->apiToken)->get($this->urlUsuarios . $userId);

        if($response->status()===200){
            $response = Http::withToken($this->apiToken)->post($this->urlPosts,[
                'user_id' => $userId,
                'title' => $faker->text(70),
                'body' => $faker->text,
            ]);

            $novoPost = json_decode($response->body());
            Session::put('novoPost',$novoPost);

            return view('etapas.etapa3',[
                'novoUsuario' => Session::get('novoUsuario'),
                'novoPost' => Session::get('novoPost')
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
        return view('listas.posts',[
            'posts' => $this->getPosts(),
            'retorno' => $response,
        ]);
    }
}
