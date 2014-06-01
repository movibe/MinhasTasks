<?php

class Lista extends Eloquent {
	protected $guarded = array();

	public static $regras = [
		'titulo' => 'required'	
	];

	/**
	 * Uma lista possuem várias tarefas (hasMany)
	 * @return [type] [description]
	 */
	public function tarefas(){
		return $this->hasMany('Tarefa','lista_id');
	}

	/**
	 * Uma lista pertence a um usuário (belongsTo)
	 * @return [type] [description]
	 */
	public function usuario(){
		return $this->belongsTo('User', 'user_id');
	}
}
