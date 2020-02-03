<?php

require_once(dirname(__FILE__).'/../include/conexao.php');
require_once(dirname(__FILE__).'/../model/Colaborador.php');

class ColaboradorRepository {

    private static $conexao;
  
    public function __construct() {}    
    private function __wakeup() {}
    private function __clone() {}

    public function findAll() {
        $sql = "SELECT * FROM colaborador order by col_nome;";
        $colaboradores = Conexao::fetchAll($sql);        
        $lista = array();
        foreach ($colaboradores as $key => $value) {
            $colaborador = new Colaborador($value['col_nome'], $value['col_senha']);
            $colaborador->setId($value['col_id']);
            $colaborador->setFuncao($value['col_funcao']);
            $colaborador->setLogin($value['col_login']);
            $colaborador->setStatus($value['col_status']);
            array_push($lista, $colaborador);
        }
        return $lista;
    }

    public function find($login, $senha) {
        $sql = "select * from colaborador where col_login = '$login' and col_senha = md5('$senha'||col_id)";
        $dao = Conexao::fetch($sql);        
        
        $colaborador = new Colaborador($dao['col_nome'], $dao['col_senha']);
        $colaborador->setId($dao['col_id']);
        $colaborador->setFuncao($dao['col_funcao']);
        $colaborador->setLogin($dao['col_login']);
        $colaborador->setStatus($dao['col_status']);
        
        return $colaborador;
    }

    public function criarColaborador($nome) {
        $sql = "INSERT INTO colaborador(col_nome) VALUES ('$nome') returning col_id;";
        return Conexao::query($sql);
    }
    
}

?>