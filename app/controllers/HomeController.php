<?php

    namespace App\controllers;
    use App\core\Controller;

    class HomeController extends Controller{

        public function index(){
          $this->view('home'.DS.'index');
        }

        public function about(){
          $this->view('home'.DS.'about');
        }
    }