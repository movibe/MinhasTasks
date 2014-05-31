<?php

class ListasController extends BaseController {

	protected $layout = 'layout.layout';

	public function getIndex(){
		$listas = Lista::all();
		$this->layout->content = View::make('listas.index', compact('listas'));
	}

	public function getCadastro(){
		$this->layout->content = View::make('listas.cadastro');
	}

	public function postCadastro(){
		
		$val = Validator::make(Input::all(), Lista::$regras);

		if ($val->fails()) {
			return Redirect::to('listas/cadastro')->withErrors($val);
		} else {
			$lista = new Lista;
			$lista->titulo = Input::get('titulo');
			$lista->save();

			$this->layout->content = View::make('listas.cadastro')->with('sucesso', TRUE);
		}

	}


}
