<?php

class Tarefa extends Eloquent {
	protected $guarded = array();

	public static $regras = [
		'titulo'=> 'required'
	];
}
