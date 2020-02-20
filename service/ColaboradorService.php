<?php 
require_once(dirname(__FILE__).'/../Exception/SprintException.php');
require_once(dirname(__FILE__).'/../model/Colaborador.php');
require_once(dirname(__FILE__).'/../util/uteis.php');
session_start();

class ColaboradorService {

    public static function logar($login, $senha) {
        $usuario = ColaboradorFactory::repository()->find($login, $senha);
        if($usuario === false) {
            throw new SprintException("Houve uma falha na autenticação do sistema. Verifique o que houve.", 500, null);           
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
               return new SprintException("Informações do usuário estão errados.", 1, null);                
            }
        }
    }

    public static function sair() {
        session_destroy();
        session_unset();
        return true;
    }

    public static function cadastrarColaborador($form) {
        
        $formulario = converterFormEmArray($form['cadastrarColaborador']);

        $colaborador = new Colaborador($formulario['nome'], $formulario['password']);
        $colaborador->setFuncao($formulario['cargo']);
        $colaborador->setLogin($formulario['login']);
        return ColaboradorFactory::repository()->save($colaborador);
    }

    public static function delete($id) {
        settype($id, 'integer');
        if($id > 0) {
            return ColaboradorFactory::repository()->delete($id);
        } else return false;
    }

    public static function atualizar($form) {
        $formulario = converterFormEmArray($form);
        if($formulario['id'] > 0) {
            $colaborador = new Colaborador($formulario['nome'], '');
            $colaborador->setId($formulario['id']);
            $colaborador->setFuncao($formulario['cargo']);
            $colaborador->setLogin($formulario['newlogin']);
            $colaborador->setSenha($formulario['newpassword']);
            return ColaboradorFactory::repository()->update($colaborador);
        } else return false;
    }
}