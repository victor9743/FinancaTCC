<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;

    use App\Models\Produto;
    use App\Models\Info;

    class indexController extends Action {

        public function index()
        {
            //instancia de conexao
            // $produto =  Container::getModel('produto');
            //instanciar modelo


            // $produtos = $produto->getProdutos();

            // $this->view->dados = $produtos;
           
            //chamada das views
            //require_once "..\App\Views\index\index.phtml";
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
        public function verificarUsuario(){
            $usuario = Container::getModel('Usuario');

            $usuario = $usuario->verificarUsuario($_POST['usuario']);

            // retorna dados em formato json. inserir sempre as duas linhas
            header('Content-Type: application/json');
            echo json_encode($usuario);
        }

        public function verificarEmail(){
            $email = Container::getModel('Usuario');
            $email = $email->VerificarEmail($_POST['email']);

            header('Content-Type: application/json');
            echo json_encode($email);
        }

        public function login(){    
            $login = Container::getModel('Usuario');
            $login = $login->login($_POST['email'], md5($_POST['senha']));

            header('Content-Type: application/json');
            echo json_encode($login);
            
        }


    }

?>