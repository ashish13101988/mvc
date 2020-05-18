<?php

namespace App\core;

class Application{

    protected $controller ='homeController';
    protected $action ='index';
    protected $params = [];

    public function __construct(){
        $this->prepareUrl();
        $this->createController();
    }

    private function prepareUrl(){
        $request = trim($_SERVER['REQUEST_URI'],'/');
       
            if(!empty($request)){
                $url = explode('/',trim($request));
              
                $pos = array_search(strtolower('public'),$url);
                
                $pos > 0 ? $url = array_slice($url,$pos+1) : $url;
               
                
              
                $this->controller = isset($url[0]) ? $url[0].'Controller' : 'homeController';
                $this->action = isset($url[1]) ? $url[1] : 'index';
                unset($url[0],$url[1]);
                $this->params =!empty($url)? array_values($url) : [];
            }
    }

    private function createController(){
        $controllerClass = 'App\\controllers\\'.ucfirst($this->controller);
        //checking class existence
        
        if(class_exists($controllerClass)){
            $parents = class_parents($controllerClass);
            $parents = explode("\\",$parents['App\core\Controller']);

            //checking for controller parent class;
            if(in_array("Controller",$parents)){
                $this->controller = new $controllerClass;
                //method exist in class;
                
                if(method_exists($controllerClass,$this->action)){
                    call_user_func_array([$this->controller,$this->action],$this->params);
                }else{
                    echo "<h2>'$this->action' method does not exist in $controllerClass .</h2>";
                    return;
                }
            }else{
                echo "<h2>Base controller does not exist</h2>";
                return;
            }
        }else{
            echo $this->controller.' does not exists.';
        }
    }

    
}