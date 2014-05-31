<?php

class Tarefa extends Eloquent {
	protected $guarded = array();

	public static $regras = [
		'titulo'=> 'required'
	];

	public function listas(){
		return $this->belongsTo('Lista','lista_id');
	}
}
