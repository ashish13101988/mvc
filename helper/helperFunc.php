<?php

function dd($obj){
    echo "<pre>";
    var_dump($obj);
    echo "</pre>";
}

function PostMethod(){
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        echo "This Method not allowed on this route";
        exit;
    }
}

function GetMethod(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "This Method not allowed on this route";
        exit;
    }
}

    function inputValidation($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function nameValidation($name){
        return preg_match("/^[a-zA-Z ]*$/",$name) ? true : false;
    }

    function phoneValidation($phone)
        {
            // Allow +, - and . in phone number
            $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
            // Remove "-" from number
            $phone_to_check = str_replace("-", "", $filtered_phone_number);
            // Check the lenght of number
            // This can be customized if you want phone number from a specific country
            if (strlen($phone_to_check) != 10) {
                return false;
            } 
            $phone = $phone_to_check;
            return $phone;
        }

    function emailFormat($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $EmailValidation = array(
                'errmsg'=>"Please write valid email address",
                'validation' => false
            );
            
        }else{
            $EmailValidation['validation'] = true;
        }
            return $EmailValidation;
    }

   
        
    function pwdValidation($pwd){
           
        if(strlen($pwd) < 8 || strlen($pwd) > 16){
            $pwdvalidation = array(
                'errmsg'=>"Password length must be between 8 to 16 charcters",
                'validation' => false
            );
        }else{
                $pwdvalidation['validation'] = true;
        }
            return $pwdvalidation;
    }

   
    function headerValidation(){
        $headers = get_nginx_headers($function_name='getallheaders');
        //dd($headers);
        if(key_exists('Authorization',$headers)){
           
            return !empty($headers['Authorization'])?$headers['Authorization']:false; 
        }else{
            return false;
        }
    }

    function get_nginx_headers($function_name='getallheaders'){

        $all_headers=array();

        if(function_exists($function_name)){ 
            $all_headers=$function_name();
        }
        else{

            foreach($_SERVER as $name => $value){

                if(substr($name,0,5)=='HTTP_'){

                    $name=substr($name,5);
                    $name=str_replace('_',' ',$name);
                    $name=strtolower($name);
                    $name=ucwords($name);
                    $name=str_replace(' ', '-', $name);

                    $all_headers[$name] = $value; 
                }
                elseif($function_name=='apache_request_headers'){
                    $all_headers[$name] = $value; 
                }
            }
        }


        return $all_headers;
}