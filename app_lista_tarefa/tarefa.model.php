<?php

class Tarefa{
    public $id;
    public $id_status;
    public $tarefa;
    public $data_cadastrado; 

    public function __get($atributo){
       return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
        
    }



}


?>