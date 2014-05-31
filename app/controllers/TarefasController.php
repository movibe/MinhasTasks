<?php 

class TarefasController extends BaseController{

	protected $layout = 'layout.layout';

	public function getIndex(){
		$tarefas = Tarefa::all();
		$this->layout->content = View::make('tarefas.index', compact('tarefas'));
	}

	/*
	Cadastro de Tarefas
	 */
	public function getCadastro(){
		$this->layout->content = View::make('tarefas.cadastro');
	}

	public function postCadastro(){
		
		$validacao = Validator::make(Input::all(), Tarefa::$regras);

		if ($validacao->fails()) {
			return Redirect::to('cadastro')->withErrors($validacao);
		}

		$tarefa = Tarefa::create(Input::all());
		$tarefa->save();

		return Redirect::to('');

	}

	public function postCheck(){
		
		if (Request::ajax()) {
			$validacao = Validator::make(Input::all(), ['tarefa_id'=> 'required|integer']);

			if ($validacao->fails()) {
				return Response::json(['status'=> false, 'mensagem' => 'problema na validacao' ]);
			} else {
				try {
					$tarefa = Tarefa::findOrFail(Input::get('tarefa_id'));
					$tarefa->status = true;
					$tarefa->save();

					return Response::json(['status'=> true, 'titulo' => $tarefa->titulo]);
				}
				catch (Exception $e ){
					return Response::json(['status'=>false, 'mensagem' => $e->getMessage()]);
				}
			}
		}
	}
}