<?php
require_once '../app_lista_tarefa/tarefa.model.php';
require_once '../app_lista_tarefa/tarefa.service.php';
require_once '../app_lista_tarefa/conexao.php';

$acao= isset($_GET["acao"]) ? $_GET["acao"]:$acao;

if($acao=="inserir"){
    $tarefa= new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);
    $conexao= new Conexao();
    $service=new TarefaService($tarefa, $conexao);
    $service->inserir();
    header("Location:nova_tarefa.php?conclusao=1");
}

if($acao=="reupera"){
    $conexao= new Conexao();
    $tarefa= new Tarefa();
    $service=new TarefaService($tarefa, $conexao);
    $lista= $service->recuperar();
}
if($acao=="excluir"){
    $conexao= new Conexao();
    $tarefa= new Tarefa();
    $tarefa->__set('id', $_GET['id']);
    $service= new TarefaService($tarefa, $conexao); 
    $service->remover();
    header("Location:todas_tarefas.php");
}
if($acao == 'atualizar') {

    $tarefa = new Tarefa();
   
    $tarefa->__set('id', $_POST['id']);
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $service = new TarefaService($tarefa, $conexao);

    if($service->atualizar()) {
        header('location: todas_tarefas.php');
    }


}

?>