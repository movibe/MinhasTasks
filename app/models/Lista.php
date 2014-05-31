<?php

class Lista extends Eloquent {
	protected $guarded = array();

	public static $regras = [
		'titulo' => 'required'	
	];
}
