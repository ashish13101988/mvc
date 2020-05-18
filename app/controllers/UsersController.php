<?php
   
    namespace App\controllers;
    use App\core\Controller;
    use App\controllers\UserAuth as Auth;
    
    class UsersController extends Controller{

        //fetching all users
        public function index(){ 
           
            GetMethod();
            UserAuth::validateJwtToken();
            
            $this->Model('Users');
            $data = $this->model->fetchAllUsers();

            echo json_encode(array(
                'status' => 1,
                'msg'=>'success',
                'data'=>  $data
            ));
            exit;
        }

        //fetching single user
         public function find($id){
            GetMethod();
            UserAuth::validateJwtToken();
            $this->Model('Users');
            $data = $this->model->userData($id);
             echo json_encode(array(
                'status' => 1,
                'msg'=>'success',
                'data'=>  $data
            ));
            exit;
        }


        //creating new user
        public function create(){

            PostMethod();
            
            isset($_POST['phone'])? $contact = inputValidation($_POST['phone']) : $contact ='NA';
            $fullname    = inputValidation($_POST['fullname']);
            $email       = inputValidation($_POST['email']);
            $pwd         = inputValidation($_POST['pwd']);
            
   
            $this->Model('Users');
           
            if(empty($fullname) || empty($email) || empty($pwd)){
                echo json_encode(array(
                    'status'=> 0,
                    'msg'=>'Name, Email and Password field required'
                ));
                exit;
            }
            if(!nameValidation($fullname)){
                 $status = array(
                    'status'=>0,
                    'msg'=> 'Only charcters allowed'
                );
                echo json_encode($status);
                exit;
            }
            //checking email format
            $emailVaild = emailFormat($email);
            if(!$emailVaild['validation']){
                $status = array(
                    'status'=>0,
                    'msg'=> $emailVaild['errmsg']
                );
                echo json_encode($status);
                exit;
            }
            //validating phone no
            if(!empty($contact) && isset($contact) && $contact != 'NA'){
                 if(!phoneValidation($contact)){
                    $status = array(
                        'status'=>0,
                        'msg'=> 'invalid phone no'
                    );
                    echo json_encode($status);
                    exit;
                }else{
                    $contact = phoneValidation($contact);
                }
            }
           

            if($this->model->userEmail($email)){
                echo json_encode(array(
                    'status'=> 0,
                    'msg'=>'email already exist'
                ));
                exit;
            }

            $pwdValid = pwdValidation($pwd);
            if(!$pwdValid['validation']){
                 echo json_encode(array(
                    'status'=> 0,
                    'msg'=>$pwdValid['errmsg']
                ));
                exit;
            }

            //inserting data
            $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
            $values = array(
                'fullname'=>$fullname,
                'email'=>$email,
                'contact'=>$contact,
                'pwd'=>$hashpwd
            );
            $data = $this->model->createUser($values);
            if($data){
                echo json_encode(array(
                    'status'=> 1,
                    'msg'=>'new user created'
                ));
                exit;
            }


        }

        public function update(){
            PostMethod();
            UserAuth::validateJwtToken();
            $jwtData = UserAuth::validateJwtToken();
            

            $fullname    = inputValidation($_POST['fullname']);
            $email       = inputValidation($_POST['email']);
            $contact     = inputValidation($_POST['phone']);
   
            $this->Model('Users');
           
            if(empty($fullname) || empty($email)){
                echo json_encode(array(
                    'status'=> 0,
                    'msg'=>'Name, Email field required'
                ));
                exit;
            }
            if(!nameValidation($fullname)){
                 $status = array(
                    'status'=> 0,
                    'msg'=> 'Only charcters allowed'
                );
                echo json_encode($status);
                exit;
            }
            //checking email format
            $emailVaild = emailFormat($email);
            if(!$emailVaild['validation']){
                $status = array(
                    'status'=>0,
                    'msg'=> $emailVaild['errmsg']
                );
                echo json_encode($status);
                exit;
            }
            //validating phone no
                if(!empty($contact) && isset($contact)){
                   
                    if(!phoneValidation($contact)){
                    $status = array(
                        'status'=>0,
                        'msg'=> 'invalid phone no'
                    );
                    echo json_encode($status);
                    exit;
                    }else{
                        $contact = phoneValidation($contact);
                    }
                }
            

            if($this->model->userEmail($email)){
               $emailData = $this->model->userEmail($email);
                if($emailData[0]['email'] != $email){
                    $this->model->userEmail($email);
                        echo json_encode(array(
                        'status'=> 0,
                        'msg'=>'email already exist'
                    ));
                    exit;
                }
            }

           //updating user data
            $values = array(
                'id'=> $jwtData->data->id,
                'fullname'=>$fullname,
                'email'=>$email,
                'contact'=>$contact,
            );
            $data = $this->model->updateUser($values);
            if($data){
                echo json_encode(array(
                    'status'=> 1,
                    'msg'=>'user updated successfully'
                ));
                exit;
            }

            
        }//update method ends here

        public function delete(){
           // PostMethod();
            UserAuth::validateJwtToken();
            $jwtData = UserAuth::validateJwtToken();
            $values = array(
                'id'=> $jwtData->data->id
            );
            $this->Model('Users');
            $data = $this->model->userDelete($values);
            if($data){
                echo json_encode(array(
                    'status'=> 1,
                    'msg'=>'User removed successfully'
                ));
                exit;
            }


               
        }

        //checking user authentication
        public function userAuth(){  
            
            PostMethod();
                  
            $email = inputValidation($_POST['email']);
            $pwd   = inputValidation($_POST['pwd']);

            //checking email format
            $emailVaild = emailFormat($email);
            if(!$emailVaild['validation']){
                $status = array(
                    'status'=>0,
                    'msg'=> $emailVaild['errmsg']
                );
                echo json_encode($status);
                exit;
            }
                
            
                $this->Model('Users');
                if($this->model->userEmail($email)){
                    if($this->model->pwdCheck($email,$pwd)){
                        $row = $this->model->pwdCheck($email,$pwd);
                        
                        $data = array(
                            'id'=>$row[0]['id'],
                            'username'=>$row[0]['name'],
                            'email'=> $row[0]['email'],
                            'role'=>$row[0]['user_role'],
                        );
                       
                        $response = UserAuth::genrateJwtToken($data);
                        
                        
                    }else{
                        echo json_encode(array(
                            'status'=> 0,
                            'msg'=>'incorrect password'
                        ));
                        exit;
                    }
                }else{
                        echo json_encode(array(
                            'status'=>0,
                            'msg'=>'email doesn\'t exist',
                        ));
                    exit;
                }

            }//userAuth  function
        
        //email exists method created for frontend request
        public function emailExist(){
            $this->Model('Users');
            if(isset($_POST['email'])){
                $email= $_POST['email'];
                if($this->model->userEmail($email)){
                    echo 'true';
                }else{
                    echo 'false';
                }
            }
            
        }//email exists method created for frontend request
        
        
        
        //email exists method created for frontend request
        public function emailNotExist(){
            $this->Model('Users');
            if(isset($_POST['email'])){
                $email= $_POST['email'];
                if($this->model->userEmail($email)){
                    echo 'false';
                }else{
                    echo 'true';
                }
            }
            
        }//email exists method created for frontend request
        
        public function tokenVerified(){
             PostMethod();
             $jwtData = UserAuth::validateJwtToken();
             echo $jwtData;
        }
        
    }//classbracket

 

   
?>