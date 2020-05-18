<?php

    namespace App\controllers;
    
    class View{
        protected $view_file;
        protected $view_data;

        public function __Construct($view_file,$view_data){
            
           $this->view_file = $view_file;
           $this->view_data = $view_data;
           $this->render();
        }

        public function render(){
            $file_path = VIEW.$this->view_file.'.php';
           
            if(file_exists($file_path)){
               include($file_path);
            }else{
                echo "this view $this->view_file not found";
            }
        }
    }




?>