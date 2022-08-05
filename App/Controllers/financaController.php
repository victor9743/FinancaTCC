<?php
    namespace App\Controllers;

    use MF\Controller\Action;
    use MF\Model\Container;
    class financaController extends Action {
        public function home(){
            $this->render('home', 'layout1');
        }
        
    }
?>