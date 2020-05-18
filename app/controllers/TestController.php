<?php

    namespace App\controllers;
    use App\core\Controller;
  

    class CarController extends Controller {
        public function index(){
            
            $this->Model('Car');
            
            $this->View('car'.DS.'index',$this->model->getCars());
            
        }
    }

?>