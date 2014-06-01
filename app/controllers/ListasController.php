<?php

class ListasController extends BaseController {

	protected $layout = 'layout.layout';

	public function getIndex(){
		$this->layout->content = View::make('index');
	}

	public function getCadastro(){
		$this->layout->content = View::make('listas.cadastro');
	}

	public function getTarefas($lista_id = 0 ){
		if($lista_id == 0) return $this->listar();
		
		$lista = Lista::findOrFail($lista_id);
		$this->layout->content = View::make('listas.tarefas', compact('lista'));
	}

	public function getDeletar($id_lista){
		if ($id_lista == 0 ) return Redirect::to('/');
		$lista = Lista::findOrFail($id_lista);
		$lista->delete();
		return Redirect::to('/');
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
			// $this->layout->content = View::make('listas.index', compact('listas'))->with('sucesso', TRUE);
			return Redirect::to('listas/tarefas/' . $lista->id);
		}

	}


}
