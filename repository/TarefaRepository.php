<?php 
require_once('./../include/Conexao.php');
require_once('./../model/Tarefa.php');

class TarefaRepository {

    public function __construct() { }
    private function __wakeup(){}
    private function __clone(){}

    public function findAll($sprint) {
        $sql = "select * from tarefa left join sprint on spt_id = tar_sprint where tar_sprint = $sprint";
        return Conexao::fetchAll($sql);                
    }
}

?>