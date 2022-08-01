<?php

namespace App\Classes;

use Illuminate\Support\Facades\Http;

class Geral
{
    private string $apiToken;
    private string $baseUrl;
    private string $urlUsuarios;
    private string $urlPosts;
    private string $urlComentarios;


    public function __construct()
    {
        $this->apiToken         = '25fb101a9d107436e55515ffaad0faf08a136475790d57ca11fe55a7086ca5a4';
        $this->baseUrl          = 'https://gorest.co.in';
        $this->urlUsuarios      = $this->baseUrl . '/public/v2/users/';
        $this->urlPosts         = $this->baseUrl . '/public/v2/posts/';
        $this->urlComentarios   = $this->baseUrl . '/public/v2/comments/';

    }

    /**
     * Método público para obter o token da api
     * @return string
     */
    public function getApiToken(): string
    {
        return $this->apiToken;
    }

    /**
     * Método público para obter a url de usuários na api
     * @return string
     */
    public function getUrlUsuarios(): string
    {
        return $this->urlUsuarios;
    }

    /**
     * Método público para obter a url de posts na api
     * @return string
     */
    public function getUrlPosts(): string
    {
        return $this->urlPosts;
    }

    /**
     * Método público para obter a url de comentários na api
     * @return string
     */
    public function getUrlComentarios(): string
    {
        return $this->urlComentarios;
    }

    /**
     * Verifica se uma model é válida e atribui uma url para a ação
     * @param string $model
     * @return string
     */
    public function validaModel(string $model): string
    {
        // ATRIBUI UMA URL AO PARAMETRO MODEL
        $url = match ($model){
            'usuario'   => $this->getUrlUsuarios(),
            'post'      => $this->getUrlPosts(),
            default     => 'inexistente'
        };

        return $url;
    }


    /**
     * Exclui dados da api com vaidação de url e status de retorno
     * @param string $model
     * @param int $id
     * @return array
     */
    public function delete(string $model, int $id): array
    {
        $url = $this->validaModel($model);
        $retorno = [];

        // VERIFICA SE A URL É VALIDA
        if($url === 'inexistente'){
            $retorno = [
                'status' => 'erro',
                'msg' => 'Model Inexistente',
                'class' => 'danger',
            ];
        } else {

            $response = Http::withToken(Geral::getApiToken())->delete($url . $id);

            if ($response->successful()){
                $retorno = [
                    'status' => 'sucesso',
                    'msg' => 'Excluído com sucesso',
                    'class' => 'success',
                ];
            } elseif ($response->failed()){
                $retorno = [
                    'status' => 'erro',
                    'msg' => 'Erro ao tentar excluir (status: ' . $response->status() . ')',
                    'class' => 'danger',
                ];
            }
        }

        return $retorno;
    }


}
