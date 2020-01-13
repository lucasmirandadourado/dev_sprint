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
            $datas = $value['spt_data_dia'];

            $sprint = new Sprint($nome, $data_inicio, $data_fim, $qtd_col);
            $sprint->setId($id);
            $sprint->setDateDiasSprint($datas);

            array_push($lista, $sprint);
        }
        return $lista;
    }
}

?>