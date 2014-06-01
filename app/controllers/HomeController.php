<?php

class HomeController extends BaseController {

	protected $layout = 'layout.layout';

	public function getIndex() {
		$this->layout->content = View::make('index');
	}

}
