<?php
    namespace App;
    use MF\init\Bootstrap;

    class Route extends Bootstrap {
        
  
        
        protected function initRoutes() {
            
            $routes['home'] = array(
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            );
            $routes['cadastreSe'] = array(
                'route' => '/cadastreSe',
                'controller' => 'indexController',
                'action' => 'cadastreSe'
            );

            $routes["registrar"] = array(
                'route' => "/registreSe",
                'controller' => 'indexController',
                'action' => 'registreSe'
            );

            $routes["verificarUsuario"] = array(
                'route' => '/verificarUsuario',
                'controller' => 'indexController',
                'action' => 'verificarUsuario'
            );
            
            $routes["verificarEmail"] = array(
                'route' => '/verificarEmail',
                'controller' => 'indexController',
                'action' => 'verificarEmail'
            );
             
            $routes["homeFinanca"] = array(
                'route' => '/home',
                'controller' => 'financaController',
                'action' => 'home'
            );

            $routes["login"] = array(
                'route' => '/login',
                'controller' => 'indexController',
                'action' => 'login'
            );

           

            $this->setRoutes($routes);
        }
    }
?>