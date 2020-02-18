<?php

require_once(dirname(__FILE__).'/../factory/ConexaoFactory.php');
require_once(dirname(__FILE__).'/../include/class.Postgre.php');
require_once(dirname(__FILE__).'/../model/Colaborador.php');

class ColaboradorRepository {

    public function __construct() {} 
    private function __wakeup() {}
    private function __clone() {}

    public function findAll() {
        $sql = "SELECT * FROM colaborador order by col_nome;";
        
        $colaboradores = Conexao::getConexao()->fetch($sql);        
        
        $lista = array();
        foreach ($colaboradores as $key => $value) {

            $colaborador = new Colaborador($value->col_nome, $value->col_senha);
            $colaborador->setId($value->col_id);
            $colaborador->setFuncao($value->col_funcao);
            $colaborador->setLogin($value->col_login);
            $colaborador->setStatus($value->col_status);
            $colaborador->setSenha(null);
            array_push($lista, $colaborador);
        }
        return $lista;
    }

    public function find($login, $senha) {
        $sql = "select * from colaborador where col_login = '$login' 
            and col_senha = md5('$senha'||'d8ir0uQfFnloK7jt&nc!#5')";
        $dao = Conexao::getConexao()->fetch($sql);                    
        $colaborador = new Colaborador($dao[0]->col_nome, $dao[0]->col_senha);
        $colaborador->setId($dao[0]->col_id);
        $colaborador->setFuncao($dao[0]->col_funcao);
        $colaborador->setLogin($dao[0]->col_login);
        $colaborador->setStatus($dao[0]->col_status);
        
        return $colaborador;
    }

    public function criarColaborador($nome) {
        $sql = "INSERT INTO colaborador(col_nome) VALUES ('$nome') returning col_id;";
        return Postgre::query($sql);
    }

    public function save($colaborador) {
        $sql = "INSERT INTO colaborador(col_nome, col_login, col_senha, col_status, col_funcao) 
            VALUES ('". $colaborador->getNome() ."',
            '".$colaborador->getLogin()."',
            md5('".$colaborador->getSenha()."'||'d8ir0uQfFnloK7jt&nc!#5'),
            'true',
            '".$colaborador->getFuncao()."') returning col_id;";
        return Postgre::fetch($sql);
    }
     
}

?>