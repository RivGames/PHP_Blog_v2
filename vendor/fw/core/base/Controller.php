<?php
namespace fw\core\base;

abstract class Controller{

    public $route = [];
    public $view;
    public $layout;
    public $vars = [];
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }
    public function getView(){
        $vObj = new View($this->route,$this->view,$this->layout);
        $vObj->render($this->vars);
    }
    public function set($vars)
    {
        $this->vars = $vars;
    }
}