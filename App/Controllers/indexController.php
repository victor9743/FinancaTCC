<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;
    class indexController extends Action {

        public function index()
        {
            $this->render('index', 'layout1');
        }

        public function sobreNos()
        {
            //instancia de conexao
            $info = Container::getModel('info');

            //instanciar modelo
            $infos = $info->getInfo();

            $this->view->dados = $infos;
            $this->render('sobrenos', 'layout1');
        }

        public function cadastreSe()
        {
            $this->render('cadastreSe', 'layout1');
        }

        public function registreSe()
        {
            $usuario = Container::getModel('Usuario');

            // envio dos parametros

            $usuario->salvar($_POST['usuario'], $_POST['email'],  md5($_POST['senha']));

            $this->render('index', 'layout1');
        }

        public function verificarUsuario()
        {
            $usuario = Container::getModel('Usuario');

            $usuario = $usuario->verificarUsuario($_POST['usuario']);

            // retorna dados em formato json. inserir sempre as duas linhas
            header('Content-Type: application/json');
            echo json_encode($usuario);
        }

        public function verificarEmail()
        {
            $email = Container::getModel('Usuario');
            $email = $email->VerificarEmail($_POST['email']);

            header('Content-Type: application/json');
            echo json_encode($email);
        }

        public function login(){    
            $login = Container::getModel('Usuario');
            $login = $login->login($_POST['email'], md5($_POST['senha']));
            //var_dump($login);

            if ($login->acesso) 
            {
                session_start();
                $_SESSION['usuario']  = $login->usuario;
                header('Location: /home');

            } else {
                header('Location: /?auth=erroSenha');

            }
        }


    }

?>