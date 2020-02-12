<?php 

require_once(dirname(__FILE__).'/../factory/TarefaFactory.php');
require_once(dirname(__FILE__).'/../factory/ColaboradorFactory.php');

if(isset($_GET['sprint'])) {  
    $tarefas = TarefaFactory::repository()->findAllBySprint($_GET['sprint']);  
    $colaboradores = ColaboradorFactory::repository()->findAll();
    echo json_encode(array("tarefas" => $tarefas, "colaboradores" => $colaboradores));
    exit;
}

if (isset($_POST['buscarTarefas'])) {  
    echo json_encode(TarefaFactory::repository()->findAllBySprint($_POST['buscarTarefas']));    
    exit;
}

if(isset($_POST['salvarTarefa'])) {
    echo json_encode(TarefaFactory::service()->criarTarefa($_POST));
    exit;
}

if (isset($_POST['buscarTarefa'])) {  
    echo json_encode(TarefaFactory::repository()->find($_POST['buscarTarefa']));    
    exit;
}