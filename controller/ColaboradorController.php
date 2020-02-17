<?php 

require_once(dirname(__FILE__).'/../factory/ColaboradorFactory.php');

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