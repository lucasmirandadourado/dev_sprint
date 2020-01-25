<?php 
require_once(dirname(__FILE__).'/../factory/ColaboradorFactory.php');

if(isset($_POST['login'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    echo json_encode(ColaboradorFactory::service()->logar($login, $senha));
    exit;
}

if(isset($_POST['sair'])) {    
    echo json_encode(ColaboradorFactory::service()->sair());
    exit;
}
?>