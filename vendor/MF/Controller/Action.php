<?php

namespace MF\Controller;
use stdClass;

abstract class Action {
    protected $view;

    public function __construct()
    {
        //stdclass() criar um objeto vazio
        $this->view = new stdClass();    
    }

    protected function render($view, $layout)
    {
        $this->view->page = $view;
        require_once "../App/Views/".$layout.".phtml";
     
    }

    protected function content()
    {
        $classAtual = get_class($this);
        $classAtual = str_replace('App\\Controllers\\', '', $classAtual);
        $classAtual = str_replace('Controller', '', $classAtual);

    
        require_once "../App/Views/".$classAtual."/".$this->view->page.".phtml";

    }
}

?>