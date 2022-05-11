<?php

class TarefaService{
    private $conexao;
    private $tarefa;

    public function __construct($tarefa ,$conexao){
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;
    }

    public function inserir(){
        $insert= "INSERT INTO tb_tarefas (tarefa)VALUES(:tarefa)";
        $query=$this->conexao->prepare($insert);
        $query->bindValue(':tarefa',$this->tarefa->__get('tarefa'));
        $query->execute();
    }
    public function recuperar(){
        $selct= "SELECT 
                t.id,t.tarefa, s.status 
        FROM 
            `tb_tarefas` AS t 
        INNER JOIN
             tb_status AS s 
        ON 
            t.id_status= s.id;";
        $query= $this->conexao->prepare($selct);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function remover(){
        $delete ="DELETE FROM tb_tarefas WHERE id= :id";
        $query = $this->conexao->prepare($delete);
        $query->bindValue(":id", $this->tarefa->__get('id'));
        $query->execute();
    }
    public function atualizar() { //update

		$query = "UPDATE tb_tarefas set tarefa = :tarefa where id = :id";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		return $stmt->execute(); 
	}

}


?>