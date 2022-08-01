<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ETAPAS
Route::get('/', '\App\Http\Controllers\usuarioController@index')->name('inicie.etapa1');
Route::get('/usuarios/cadastrar', '\App\Http\Controllers\usuarioController@cadastrar')->name('inicie.etapa1.do');
Route::get('/posts/cadastrar/{user_id}', '\App\Http\Controllers\postController@cadastrar')->name('inicie.etapa2.do');
Route::get('/comentarios/cadastrar/{post_id}', '\App\Http\Controllers\comentarioController@cadastrar')->name('inicie.etapa3.do');
Route::get('/posts/primeiro', '\App\Http\Controllers\postController@primeiroPost')->name('inicie.etapa4.do');
Route::get('/comentarios/cadastrar/pp/{prim_post_id}', '\App\Http\Controllers\comentarioController@cadastrarPrimeiroPost')->name('inicie.etapa5.do');

// LISTAS
Route::get('/usuarios/listar', '\App\Http\Controllers\usuarioController@lista')->name('inicie.usuarios');
Route::get('/posts', '\App\Http\Controllers\postController@lista')->name('inicie.posts');
Route::get('/comentarios', '\App\Http\Controllers\comentarioController@lista')->name('inicie.comentarios');

// DELETE
Route::get('/usuarios/delete/{model}/{id}', '\App\Http\Controllers\usuarioController@delete')->name('inicie.usuarios.delete');
Route::get('/posts/delete/{model}/{id}', '\App\Http\Controllers\postController@delete')->name('inicie.posts.delete');
Route::get('/comentarios/delete/{model}/{id}', '\App\Http\Controllers\comentarioController@delete')->name('inicie.comentarios.delete');
