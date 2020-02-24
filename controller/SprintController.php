<?php 
require_once(dirname(__FILE__).'/../factory/SprintFactory.php');

$_DELETE = array();
$_PUT = array();

if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'DELETE')) {
    parse_str(file_get_contents('php://input'), $_DELETE);
}
if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'UPDATE')) {
    parse_str(file_get_contents('php://input'), $_PUT);
}

if (isset($_POST['cadastrarSprint'])) {
    echo json_encode(SprintFactory::service()->cadastrarSprint($_POST));
    exit;
}

if(isset($_POST['info_sprint'])) {
    $info = SprintFactory::service()->buscarInfoSprint($_POST['info_sprint']);
    echo json_encode($info, JSON_OBJECT_AS_ARRAY);
    exit;
}

if(isset($_GET['buscarSprints'])) {
    $sprints = SprintFactory::service()->findAll();
    echo json_encode($sprints, JSON_OBJECT_AS_ARRAY);
    exit;
}

if(isset($_GET['buscarSprint'])) {
    $sprit = SprintFactory::service()->find($_GET['buscarSprint']);
    echo json_encode($sprit, JSON_FORCE_OBJECT);
    exit;
}

if(isset($_DELETE['delete'])) {
    echo json_encode(SprintFactory::service()->delete($_DELETE['delete']));
    exit;
}

if(isset($_DELETE['deleteDia'])) {
    echo json_encode(SprintFactory::service()->deleteDia($_DELETE['deleteDia'], $_DELETE['spt']));
    exit;
}