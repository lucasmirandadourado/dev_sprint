<?php 

require_once(dirname(__FILE__).'/../factory/TarefaFactory.php');

if(isset($_GET['sprint'])) {  
    echo json_encode(TarefaFactory::repository()->findAll($_GET['sprint']));    
    exit;
}

if (isset($_POST['buscarTarefas'])) {  
    echo json_encode(TarefaFactory::repository()->findAll($_POST['buscarTarefas']));    
    exit;
}

if(isset($_POST['salvarTarefa'])) {
    echo json_encode(TarefaFactory::service()->criarTarefa($_POST));
    exit;
}