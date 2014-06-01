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
	public function getCadastro($lista_id){
		$lista = Lista::findOrFail($lista_id);
		$this->layout->content = View::make('tarefas.cadastro',compact('lista'))->with('lista_id', $lista_id);
	}

	public function postCadastro($lista_id){
		// Verifica se a lista existe
		Lista::findOrFail($lista_id);
		
		$validacao = Validator::make(Input::all(), Tarefa::$regras);

		if ($validacao->fails()) {
			return Redirect::to('cadastro')->withErrors($validacao);
		}

		$tarefa = new Tarefa;
		$tarefa->titulo = Input::get('titulo');
		$tarefa->lista_id = $lista_id;
		$tarefa->save();

		return Redirect::to('listas/tarefas/' . $lista_id);

	}

	public function postCheck(){
		
		if (Request::ajax()) {
			$validacao = Validator::make(Input::all(), ['tarefa_id'=> 'required|integer']);

			if ($validacao->fails()) {
				return Response::json(['status'=> false, 'mensagem' => 'problema na validacao' ]);
			} else {
				try {
					
					$tarefa = Tarefa::findOrFail(Input::get('tarefa_id'));
					// Verifica se o usuario é dono da tarefa
					if ($tarefa->getUsuarioId() != Auth::user()->id) {
						throw new Exception ("Você não é dono dessa tarefa");
					}
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