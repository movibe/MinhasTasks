<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/**
 * Login 
 */

// Tela de Login e Cadastro
Route::get('login', function(){
	return View::make('login.index');
});

// Logar
Route::post('login', ['before' => 'csrf' ,function(){
	$regras = [
	'email' => 'required|email',
	'password' => 'required:min5'
	];

	$val = Validator::make(Input::all(), $regras);

	if ($val->fails()) {
		return Redirect::to('login')->withInput()->withErrors($val);
	}

	$remember = (Input::has('remember')) ? true : false;

	//tenta logar o usuário
	$login = [
	'email' => Input::get('email'),
	'password' => Input::get('password')
	];
	
	if (Auth::attempt( $login, $remember ) ) {
		return Redirect::to('listas');
	} else {
		return Redirect::to('login')->withInput()->withErrors('Usuário ou Senha Inválido');
	}

}]);

// Encerrar sessão
Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('login');
});

/**
 * Rotas do Sistema
 */

// Home
Route::get('', function(){
	return View::make('index');
});

// Rotas somente se estiver logado
Route::group(array('before' => 'auth' ), function(){
	Route::controller('listas', 'ListasController');
	Route::controller('tarefas', 'TarefasController');
});