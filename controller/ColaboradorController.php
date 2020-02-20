<?php 

require_once(dirname(__FILE__).'/../factory/ColaboradorFactory.php');

$_DELETE = array();
$_PUT = array();

if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'DELETE')) {
    parse_str(file_get_contents('php://input'), $_DELETE);
}
if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT')) {
    parse_str(file_get_contents('php://input'), $_PUT);
}

if(isset($_POST['buscarTodosColaboradores'])) {
    $colaboradores = ColaboradorFactory::repository()->findAll();
    echo json_encode($colaboradores);
    exit;
}

if(isset($_POST['cadastrarColaborador'])) {
    $colaborador = ColaboradorFactory::service()->cadastrarColaborador($_POST);
    echo json_encode($colaborador);
    exit;
}

if(isset($_DELETE['deletarColaborador'])) {
    $colaborador = ColaboradorFactory::service()->delete($_DELETE['deletarColaborador']);
    echo json_encode($colaborador);
    exit;
}

if(isset($_GET['buscarColaborador'])) {
    $colaborador = ColaboradorFactory::repository()->buscarColaborador($_GET['buscarColaborador']);
    echo json_encode($colaborador, JSON_OBJECT_AS_ARRAY);
    exit;
}