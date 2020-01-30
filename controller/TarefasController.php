<?php 

require_once(dirname(__FILE__).'/../factory/TarefaFactory.php');

if(isset($_GET['sprint'])) {
    $buscar = TarefaFactory::repository()->findAll($_GET['sprint']);  
    echo json_encode($buscar);    
    exit;
}

if (isset($_POST['buscarTarefas'])) {
    $buscar = TarefaFactory::repository()->findAll($_POST['buscarTarefas']);  
    echo json_encode($buscar);    
    exit;
}