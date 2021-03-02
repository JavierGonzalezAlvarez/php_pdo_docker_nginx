<?php
    
    //forma1 de conectar

    class classConexion {                
        private $host = "172.23.0.1:3600";                
        //private $host = "localhost"; => da este error => No such file or directory 
        //private $user = "root";
        private $user = "javier";
        //private $password = "root";
        private $password = "123";
        private $db = "db_sistema";        
        private $connect;

        public function __construct() {
            $connectString = "mysql:host=".$this->host.";dbname=".$this->db.";character=utf8";                                    
            // Check connection            
            try {
                $this -> connect = new PDO($connectString, $this->user, $this->password);
                $this -> connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "conexion exitosa\n";
            } catch (Exception $e) {
                $this -> connect = "error de conexion\n";
                echo "Error: ".$e->getMessage()."\n";
            }
        }
    }
    
    $conexion = new classConexion();

?>