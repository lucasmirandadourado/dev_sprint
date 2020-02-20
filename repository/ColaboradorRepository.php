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
        return Conexao::getConexao()->query($sql);
    }

    public function save($colaborador) {
        $sql = "INSERT INTO colaborador(col_nome, col_login, col_senha, col_status, col_funcao) 
            VALUES ('". $colaborador->getNome() ."',
            '".$colaborador->getLogin()."',
            md5('".$colaborador->getSenha()."'||'d8ir0uQfFnloK7jt&nc!#5'),
            'true',
            '".$colaborador->getFuncao()."') returning col_id;";
        return Conexao::getConexao()->fetch($sql);
    }
     
    public function delete($id) {
        if($id > 0) {
            $sql = "DELETE FROM colaborador where col_id = $id";
            return Conexao::getConexao()->query($sql);
        } else return false;
    }

    public static function buscarColaborador($id) {
        $sql = "SELECT * FROM colaborador WHERE col_id = $id";
        $result = Conexao::getConexao()->fetch($sql);
        $col = $result[0];
        $colaborador = new Colaborador($col->col_nome, '');
        $colaborador->setId($col->col_id);
        $colaborador->setLogin($col->col_login);
        $colaborador->setStatus($col->col_status);
        $colaborador->setFuncao($col->col_funcao);
        return $colaborador;
    }
}

?>