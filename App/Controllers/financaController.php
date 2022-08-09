<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;
    class financaController extends Action {
        
        public function home()
        {
            $this->auth();
            $financa = Container::getModel('Financa');

            $financa = $financa->getAll();

            $this->view->financa = $financa;
            $this->render('home', 'layout2');
        }

        public function financaNovo()
        {
            $this->auth();
            $this->render('novo', 'layout2');
        }
        
        public function salvarFinanca(){
            $this->auth();
            $financa = Container::getModel('Financa');

            $financa = $financa->salvarFinanca($_POST['descricao'], $_POST['valor'], $_POST['tipo'], $_POST['data']);
            header('Location: /home?save=true');
        }

        private function auth(){
            session_start();
            if(!isset($_SESSION['usuario']))  header('Location: /?auth=false');
        }
        
    }
?>