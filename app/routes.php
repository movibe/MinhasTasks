<?php

/**
 * Login 
 */

// Tela de Login e Cadastro
Route::get('login', function(){
	return View::make('login.signin');
});

Route::get('signup', function(){
	return View::make('login.signup');
});

Route::get('sobre', function(){
	return View::make('sobre');
});

// Logar
Route::post('login', ['before' => 'csrf' ,function(){

	$val = Validator::make(Input::all(), User::$regras_login);

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

Route::post('signup', ['before' => 'csrf',function(){

	$val = Validator::make(Input::all(), User::$regras_cadastro);

	if ($val->fails())  return Redirect::to('login')->withInput()->withErrors($val);

	// Get em todos os Inputs
	$usuario = [
		'nome'     => Input::get('nome'),
		'email'    => Input::get('email'),
		'password' => Hash::make(Input::get('password')),
		'active'   => true
	];
	
	// Cria um novo usuario
	User::create($usuario);


	// Pego os dados do Usuário Cadastro
	$user_cadastrado = User::where('email', '=' , Input::get('email'))->firstOrFail();

	// Faço o login automaticamente
	Auth::login($user_cadastrado->id);

	// Faço um redirect para cadastrar uma Lista de Tarefas
	return Redirect::to('listas/cadastro');

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