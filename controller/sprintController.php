<?php 

require_once('./../factory/SprintFactory.php');
require_once('./../service/SprintService.php');

if (isset($_POST['buscarSprint'])) {
    $buscar = SprintFactory::repository()->findAll();
    
    $select = "<option>Selecione o Sprint</option>";
    foreach($buscar as $item) {
        $select .=  "<option data-id=".$item->getId().">".$item->getNome()."</option>";
    }
    echo $select;
    exit;
}

if (isset($_POST['salvarSprint'])) {
    $buscar = SprintFactory::serice()->cadastrarSprint($_POST);
    echo json_encode($buscar);
    exit;
}

if(isset($_POST['info_sprint'])) {
    $info = SprintFactory::serice()->buscarInfoSprint($_POST['info_sprint']);
    echo json_encode($info, JSON_OBJECT_AS_ARRAY);
    exit;
}


if (isset($_POST['buscarTarefas'])) {
    $buscar = TarefaFactory::repository()->findAll($_POST['buscarTarefas']);  
    echo json_encode($buscar);    
    exit;
}