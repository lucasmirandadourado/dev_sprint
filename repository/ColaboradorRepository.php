<?php

require_once('./../include/conexao.php');
require_once('./../model/Colaborador.php');

class ColaboradorRepository {

    private static $conexao;
  
    public function __construct() {
        // self::$conexao = Conexao::getConexao();
    }
    
    private function __wakeup(){}
    private function __clone(){}

    public function findAll() {
        $sql = "SELECT * FROM colaborador;";
        $colaboradores = Conexao::fetchAll($sql);        
        $lista = array();
        foreach ($colaboradores as $key => $value) {
            $colaborador = new Colaborador($value['col_nome']);
            $colaborador->setId($value['col_id']);
            array_push($lista, $colaborador);
        }
        return $lista;
    }

    public function criarColaborador($nome) {
        $sql = "INSERT INTO colaborador(col_nome) VALUES ('$nome') returning col_id;";
        return self::$conexao::query($sql);
    }
    
}

?>