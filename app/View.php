<?php
/**
* author Fiona
* MVC View
*/

class View 
{
    private $model;
    private $controller;

    public function __construct($controller, $model){
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output(){
        $output = $this->model->str;
        return $output;

    }
    
    public function getStatus(){
		return $this->model->getStatus();
	}
}
?>

