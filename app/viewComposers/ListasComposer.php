<?php 

class ListasComposer {
	
	public function compose($view){
		$listas = User::find(Auth::user()->id)->listas;
		$view->with(compact('listas'));
	}

}