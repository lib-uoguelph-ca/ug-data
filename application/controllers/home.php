<?php

class Home_Controller extends Base_Controller {

	public $layout = 'layouts.default';

	public function action_index()
	{
		$this->layout->title = "UG-Data Search";
		$this->layout->subtitle = "Discover your data!";
		$this->layout->content = View::make('home.index');
	}

}