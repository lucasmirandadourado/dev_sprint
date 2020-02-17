dev_sprint/<?php 

require_once('./../factory/SprintFactory.php');
require_once('./../service/SprintService.php');

if (isset($_POST['buscarSprint'])) {
    $buscar = SprintFactory::repository()->findAll();
    $select = "<option>Selecione o Sprint</option>";
    foreach($buscar as $item) {
        $select .=  "<option value=".$item->getId().">".$item->getNome()."</option>";
    }
    echo $select;
    exit;
}

if (isset($_POST['salvarSprint'])) {
    echo json_encode(SprintFactory::service()->cadastrarSprint($_POST));
    exit;
}

if(isset($_POST['info_sprint'])) {
    $info = SprintFactory::service()->buscarInfoSprint($_POST['info_sprint']);
    echo json_encode($info, JSON_OBJECT_AS_ARRAY);
    exit;
}