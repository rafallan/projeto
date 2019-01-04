<?php

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

// Rota formulário de Login
Route::get('/login', 'LoginController@index')->name('login');
// Rota que efetua a autenticação
Route::post('/logar', 'LoginController@store')->name('logar');

Route::group(['prefix' => '/painel', 'middleware' => ['auth']], function (){
    // Rota dos cursos
    Route::resource('/cursos', 'Painel\CursosController');
    // Rota das disciplinas
    Route::resource('/disciplinas', 'Painel\DisciplinasController');
    // Rota das tags
    Route::resource('/tags', 'Painel\TagsController');
    // Rota dos Artigos
    Route::resource('/artigos', 'Painel\ArtigosController');
    // Rota de Logout
    Route::get('/logout', 'LoginController@logout')->name('logout');

});


Route::get('/', function () {
    return view('painel.templates.template');
});
