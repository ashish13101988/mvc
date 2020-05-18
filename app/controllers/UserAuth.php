<?php 
    namespace App\controllers;
    use \Firebase\JWT\JWT;
   
    class UserAuth{

        private static $secret_key = "pmc16";

        public function __Construct(){

        }
        
        public static function genrateJwtToken($data){
            
            $iss = "localhost";
            $iat = time();
            $nbf = $iat;
            $exp = $iat + (60*60);
            $aud = "myuser";

            $payload_info = array(
                    "iss" =>$iss,
                    "iat" =>$iat,
                    "nbf" =>$nbf,
                    "exp" =>$exp,
                    "aud" =>$aud,
                    "data" =>array(
                        "id" => $data['id'],
                        "name" =>$data['username'],
                        "email" =>$data['email'],
                        "role"=>$data['role']
                    )
                );
                

                $jwt = JWT::encode($payload_info, self::$secret_key);
               
                echo json_encode(array(
                    'status'=>1,
                    'jwt'=> $jwt,
                    'msg'=>'user logged in',
                    
                ));
                exit;
        }



        public static function validateJwtToken(){
         
            if(headerValidation()){
                $jwt = headerValidation();
            }else{
                echo json_encode(array(
                    'status' =>0,
                    'msg'=> 'Not valid authorization or Invalid key found'    
                ));
                exit; 
                
            }
            try{
                $decodedJwtData = JWT::decode($jwt, self::$secret_key,["HS256"]);
                
                $jwt = json_encode(array(
                    'status'=>1,
                    'msg'=>'success',
                    'data'=>$decodedJwtData
                ));
                return $jwt;
                
                
                
                
               
            }catch(\Exception $e){
                
                echo json_encode(array(
                    'status' =>0,
                    'msg'=> $e->getMessage()    
                ));
                exit; 
            }
                              
        }
       
            
        
    }

?>