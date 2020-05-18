<?php

    namespace App\core;
    use App\controllers\View;
    use App\core\Route;

    abstract class Controller{

        protected $view;
        protected $model;
        protected $route;

        public function View($viewName,$data=[]){
            $this->view = new View($viewName,$data);
            return $this->view;
        }

        public function Model($modelName,$data=[]){
            
            if(file_exists(MODEL.$modelName.'.php')){
                if(class_exists('App\\models\\'.$modelName)){
                    $modelClasss = 'App\\models\\'.$modelName;
                    $this->model = new $modelClasss;
                }
            } 
        }

        
    }
