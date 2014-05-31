<?php

class Lista extends Eloquent {
	protected $guarded = array();

	public static $regras = [
		'titulo' => 'required'	
	];

	public function tarefas(){
		return $this->hasMany('Tarefa','lista_id');
	}
}
