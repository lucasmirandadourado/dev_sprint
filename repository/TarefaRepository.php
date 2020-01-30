<?php 
require_once('./../include/Conexao.php');
require_once('./../model/Tarefa.php');
require_once('./../model/Sprint.php');
require_once(dirname(__FILE__).'/../factory/SprintFactory.php');

class TarefaRepository {

    public function __construct() { }
    private function __wakeup(){}
    private function __clone(){}

    public function findAll($id) {
        
        $sprint = SprintFactory::repository()->buscarInfoSprint($id);
       
        $sql = "select * from tarefa where tar_sprint = $id";
        $resultado = Conexao::fetchAll($sql);   

        foreach ($resultado as $key => $value) {
            $tar = new Tarefa($value['tar_titulo'], $value['tar_horas_estimada']);
            $tar->setId($value['tar_id']);
            $tar->setCodigo($value['tar_codigo']);
            $tar->setDescricao($value['tar_descricao']);
            $tar->setColaborador($value['tar_colaborador']);
            $tar->setBug($value['tar_bug']);
            $tar->setTarefaBug($value['tar_tarefa_bug']);
            $tar->setdataCriacao($value['tar_data_criacao']);
            $tar->setdataIniciada($value['tar_data_iniciada']);
            $tar->setDataFinalizada($value['tar_data_finalizada']);
            $tar->sethorasLancada($value['tar_horas_lancada']);
            $sprint->addTarefa($tar);
        }        
        return $sprint;
    }
}

?>