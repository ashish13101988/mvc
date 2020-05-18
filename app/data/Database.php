<?php

    namespace App\data;
    use App\data\DbConfig;
    use PDO;

    class Database extends DbConfig{
        protected $stmt;
        public $pdo;
       
        public function __construct(){
           
            try {
                    $conn = new PDO("mysql:host=".$this->DB_HOST.";dbname=".$this->DB_NAME, $this->DB_USER, $this->DB_PASSWORD);
                    
                //  set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $this->pdo = $conn;   
                }
            catch(PDOException $e)
                {
                    $status = array(
                        'type'=> 'Server Error',
                        'msg' => $e->getMessage()   
                    );
                    
                    echo json_encode($status);
                    exit;
                    
                }
        }
         //preparing query function
        
        public function query($query){
            $this->stmt = $this->pdo->prepare($query);
        }
        
        public function execute(){
            $this->stmt->execute();
        }

         public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function close_pdo() {
            $this->pdo = null;
        }

        public function bind($values, $type = null){
            foreach($values as $key => $value):
                if(is_null($type)):
                    switch(true):
                        case is_int($value):
                            $type = PDO::PARAM_INT;
                        break;
                        case is_bool($value):
                            $type = PDO::PARAM_BOOL;
                        break;
                        case is_null($value):
                            $type = PDO::PARAM_NULL;
                        break;
                        default:
                            $type = PDO::PARAM_STR;
                    endswitch;
                    $this->stmt->bindValue(":$key",$value,$type);
                else:
                    $this->stmt->bindValue(":$key",$value,$type);
                endif;
            
            endforeach;
           
        }

        public function getResult($query,$values, $type = null){
            //$this->connection();
            $this->stmt = $this->pdo->prepare($query);
            $this->bind($values, $type = null);
            $this->stmt->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function saveData($query,$values, $type = null){
            $this->stmt = $this->pdo->prepare($query);
            $this->bind($values, $type = null);
            $result = $this->stmt->execute();
                if($this->stmt->rowCount()>0):
                      $affectedRows = $this->stmt->rowCount();
                      return $affectedRows;
                endif;        
        }

        public function deleteData($query,$values, $type = null){
            $this->stmt = $this->pdo->prepare($query);
            $this->bind($values, $type = null);
            $result = $this->stmt->execute();
            return $result;
        }

       

    }