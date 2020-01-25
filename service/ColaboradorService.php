<?php 
require_once(dirname(__FILE__).'/../model/Colaborador.php');
session_start();

class ColaboradorService {

    public static function logar($login, $senha) {
        $usuario = ColaboradorFactory::repository()->find($login, $senha);
        if($usuario === false) {
            return "Houve uma falha na autenticação do sistema. Verifique o que houve.";
        } else {
            if($usuario != null && $usuario->getStatus()) {
                $_SESSION['login'] = true;                

                $_SESSION['usuario_id'] = $usuario->getId();
                $_SESSION['usuario_nome'] = $usuario->getNome();
                $_SESSION['usuario_login'] = $usuario->getLogin();
                $_SESSION['usuario_funcao'] = $usuario->getFuncao();
                $_SESSION['usuario_status'] = $usuario->getStatus();
                return true;
            } else {
                $_SESSION['login'] = false;
            }
        }
    }

    public static function sair() {
        session_destroy();
        session_unset();
        return true;
    }
}