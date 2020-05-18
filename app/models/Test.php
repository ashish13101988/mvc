<?php

    namespace App\models;

    class Car{
        protected static $data_file = 'hello';
        protected $inventory = [];

        public function __construct(){
            self::$data_file = DATA.'cars.txt';
        }
        
        private function loadcar(){
            if(file_exists(DATA.'cars.txt')){
                return $this->inventory = file(DATA.'cars.txt');
            }
        }

        public function getCars(){
           return $this->loadcar();
        }
    }
?>