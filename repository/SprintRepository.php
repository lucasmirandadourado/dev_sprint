<?php 
require_once('./../include/Conexao.php');
require_once('./../model/Sprint.php');

class SprintRepository {

    public function __construct() { }
    private function __wakeup(){}
    private function __clone(){}

    public function findAll() {
        $sql = "SELECT * FROM sprint;";
        $sprints = Conexao::fetchAll($sql);        
        $lista = array();
        foreach ($sprints as $key => $value) {
            
            $id = $value['spt_id'];
            $nome = $value['spt_nome'];
            $data_inicio = $value['spt_data_inicio'];
            $data_fim = $value['spt_data_fim'];
            $qtd_col = $value['spt_qtd_colaborador'];
        
            $sprint = new Sprint($nome, $data_inicio, $data_fim, $qtd_col);
            $sprint->setId($id);
            
            array_push($lista, $sprint);
        }
        return $lista;
    }

    public function save(Sprint $sprint) {
        $data_inicio = new DateTime($sprint->getDataInicio());
        $data_fim = new DateTime($sprint->getDataFim());
       echo $sql = "INSERT INTO sprint(
            spt_nome, 
            spt_data_inicio, 
            spt_data_fim, 
            spt_qtd_colaborador)
        VALUES ('".
        $sprint->getNome()."', '".
        $data_inicio->format('yy-m-d')."', '".
        $data_fim->format('yy-m-d')."', ".
        $sprint->getQtdCol().");";

        return Conexao::query($sql) === false ? false : true;
    }

    public function buscarInfoSprint($id) {
        $sql = "SELECT * FROM sprint where spt_id = $id;";
        $sprintDao = Conexao::fetch($sql);        
            
        $id = $sprintDao['spt_id'];
        $nome = $sprintDao['spt_nome'];
        $data_inicio = $sprintDao['spt_data_inicio'];
        $data_fim = $sprintDao['spt_data_fim'];
        $qtd_col = $sprintDao['spt_qtd_colaborador'];
    
        $sprint = new Sprint($nome, $data_inicio, $data_fim, $qtd_col);
        $sprint->setId($id);
               
        return $sprint;
    }
}
