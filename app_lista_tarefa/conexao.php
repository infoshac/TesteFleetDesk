<?php

class Conexao{
    
    private $host= 'localhost';
    private $dbname= 'php_com_pdo';
    private $user= 'root';
    private $password= '';

    public function conectar(){
        try{
            $conn= new PDO("mysql:host=$this->host;dbname=php_com_pdo",
                "$this->user",
                "$this->password"
        );
        return $conn;
        } 
        
        catch (PDOException $e){
            echo '<p>'.$e->getMessage().'</p>';
        }
        
    }
   

}


?>