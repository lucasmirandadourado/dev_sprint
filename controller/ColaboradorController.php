<?php 

require_once(dirname(__FILE__).'/../factory/ColaboradorFactory.php');

if(isset($_POST['buscarTodosColaboradores'])) {
    $colaboradores = ColaboradorFactory::repository()->findAll();
    echo json_encode($colaboradores);
    exit;
}