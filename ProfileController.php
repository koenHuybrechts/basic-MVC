<?php

class ProfileController
{
	private $model;

	public function __construct($model) {
		$this->model = $model;
	}

	public function clicked() {
		$this->model->string = "Andere string, door de action";
	}
}