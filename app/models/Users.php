<?php

namespace App\models;
use App\data\Database as DB;

class Users extends DB{

    public function fetchAllUsers(){
       
        try{
                $sql = "SELECT * FROM `users_slim4`";
                $this->query($sql);
                $users = $this->resultSet();
                return $users;

             }catch(\PDOException $e){
                {
                    $status = array(
                        'status'=> '0',
                        'msg' => $e->getMessage()   
                    );
                    
                    echo json_encode($status);
                    exit;
                    
                }
        }
    }

    public function userData($id){
       
        $sql = "SELECT * FROM `users_slim4` WHERE `id` = :id";
            try{
                $user = $this->getResult($sql,['id'=>$id]);
                return $user; 
            }catch(\PDOException $e){
                 $status = array(
                        'status'=> '0',
                        'msg' => $e->getMessage()   
                    );
                    
                    echo json_encode($status);
                    exit;
            }
    }

    public function createUser($values){
        try{
            $sql = "INSERT INTO `users_slim4` (`name`, `email`,`phone`,`password`) VALUES(:fullname,:email,:contact,:pwd)";
            $result = $this->saveData($sql,$values);
            return $result;
        }catch(\PDOException $e){
                $status = array(
                    'status'=> '0',
                    'msg' => $e->getMessage()   
                );
                echo json_encode($status);
                exit;
            }
       
    }

    //updating user;
    public function updateUser($values){
        try{
            $modified_time = date("Y-m-d H:i:s");
            $sql = "UPDATE `users_slim4` SET `name` = :fullname, `email` = :email , `phone` = :contact, `email_verified`= 0, `modified_at` = '$modified_time' WHERE `id` = :id";
            $result = $this->saveData($sql,$values);
            return $result;
        }catch(\PDOException $e){
                $status = array(
                    'status'=> '0',
                    'msg' => $e->getMessage()   
                );
                echo json_encode($status);
                exit;
        }
       
   
    
    }


    //deleting user

    public function userDelete($values){
        try{
            
            $sql = "DELETE FROM `users_slim4` WHERE id = :id";
            $result = $this->deleteData($sql,$values);
            return $result;
        }catch(\PDOException $e){
                $status = array(
                    'status'=> '0',
                    'msg' => $e->getMessage()   
                );
                echo json_encode($status);
                exit;
        }
    
    }
    

    public function userEmail($email){
        $sql = "SELECT `email` FROM `users_slim4` WHERE `email` = :email";
        try{
            $user = $this->getResult($sql,['email'=>$email]);
            return $user;
        }catch(\PDOException $e){
             $status = array(
                        'status'=> '0',
                        'msg' => $e->getMessage()   
                    );
                    
                    echo json_encode($status);
                    exit;
        }
    }

    public function pwdCheck($email,$pwd){
        $sql = "SELECT `id`,`password` FROM `users_slim4` WHERE `email` = :email";
        try{
            $data = [
                'email'=>$email, 
            ];
            $fetchpwd = $this->getResult($sql,$data);
            $result = password_verify($pwd, $fetchpwd[0]['password']);
            return $result ? $this->userData($fetchpwd[0]['id']) : false;

        }catch(\PDOException $e){
             $status = array(
                        'status'=> '0',
                        'msg' => $e->getMessage()   
                    );
                    
                    echo json_encode($status);
                    exit;
        }
    }

}