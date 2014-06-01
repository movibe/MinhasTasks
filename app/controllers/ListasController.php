<?php

class ListasController extends BaseController {

	protected $layout = 'layout.layout';

	public function getIndex(){
		$listas = User::find(Auth::user()->id)->listas;
		$this->layout->content = View::make('listas.index', compact('listas'));
	}

	public function getCadastro(){
		$this->layout->content = View::make('listas.cadastro');
	}

	public function getTarefas($lista_id = 0 ){
		if($lista_id == 0) return $this->listar();
		
		$lista = Lista::findOrFail($lista_id);

		$this->layout->content = View::make('listas.tarefas', compact('lista'));
	}

	public function postCadastro(){
		
		$val = Validator::make(Input::all(), Lista::$regras);

		if ($val->fails()) {
			return Redirect::to('listas/cadastro')->withErrors($val);
		} else {
			$lista = new Lista;
			$lista->titulo = Input::get('titulo');
			$lista->user_id = Auth::user()->id;
			$lista->save();

			$listas = User::find(Auth::user()->id)->listas;
			$this->layout->content = View::make('listas.index', compact('listas'))->with('sucesso', TRUE);
		}

	}


}
