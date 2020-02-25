<?php
require_once(dirname(__FILE__) . '/../factory/ConexaoFactory.php');
require_once(dirname(__FILE__) . '/../model/Tarefa.php');
require_once(dirname(__FILE__) . '/../model/Sprint.php');
require_once(dirname(__FILE__) . '/../factory/SprintFactory.php');

class TarefaRepository
{

    public function __construct()
    {
    }
    private function __wakeup()
    {
    }
    private function __clone()
    {
    }

    public function findAllBySprint($id)
    {

        $sprint = SprintFactory::repository()->buscarInfoSprint($id);

        $sql = "select * from tarefa where tar_sprint = $id";
        $resultado = Conexao::getConexao()->fetch($sql);

        foreach ($resultado as $key => $value) {

            $tar = new Tarefa($value->tar_titulo, $value->tar_horas_estimada);
            $tar->setId($value->tar_id);
            $tar->setCodigo($value->tar_codigo);
            $tar->setDescricao($value->tar_descricao);
            $tar->setColaborador($value->tar_colaborador);
            $tar->setBug($value->tar_bug);
            $tar->setTarefaBug($value->tar_tarefa_bug);
            $tar->setdataCriacao($value->tar_data_criacao);
            $tar->setdataIniciada($value->tar_data_iniciada);
            $tar->setDataFinalizada($value->tar_data_finalizada);
            $tar->sethorasLancada($value->tar_horas_lancada);
            $sprint->addTarefa($tar);
        }
        return $sprint;
    }

    public function save(Tarefa $tarefa, $id)
    {
        $sql = "INSERT INTO tarefa(
                tar_titulo, tar_descricao, tar_colaborador, tar_bug, 
                tar_tarefa_bug, tar_data_criacao, tar_data_iniciada, tar_data_finalizada, 
                tar_horas_estimada, tar_horas_lancada, tar_sprint, tar_codigo)
            VALUES ('" . $tarefa->getTitulo() . "', '" . $tarefa->getDescricao() . "', null, null, 
                null, now()::date, null, null, 
                '" . $tarefa->getHorasEstimada() . "', null, $id, '" . $tarefa->getCodigo() . "') RETURNING tar_id;";
        $query = Conexao::getConexao()->fetch($sql);
        $tarefa->setId($query[0]->tar_id);
        if ($query === false) {
            return false;
        } else return $tarefa;
    }

    public function find($id)
    {

        $sql = "select * from tarefa where tar_id = $id ";
        $resultado = Conexao::getConexao()->fetch($sql);

        $tar = new Tarefa($resultado->tar_titulo, $resultado->tar_horas_estimada);
        $tar->setId($resultado->tar_id);
        $tar->setCodigo($resultado->tar_codigo);
        $tar->setDescricao($resultado->tar_descricao);
        $tar->setColaborador($resultado->tar_colaborador);
        $tar->setBug($resultado->tar_bug);
        $tar->setTarefaBug($resultado->tar_tarefa_bug);
        $tar->setdataCriacao($resultado->tar_data_criacao);
        $tar->setdataIniciada($resultado->tar_data_iniciada);
        $tar->setDataFinalizada($resultado->tar_data_finalizada);
        $tar->sethorasLancada($resultado->tar_horas_lancada);

        return $tar;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tarefa WHERE tar_id = $id";
        $result = Conexao::getConexao()->query($sql);
        if ($result) {
            return true;
        } else return false;
    }

    public function findBySprint($id) {
        $sql = "select * from tarefa where tar_sprint = $id ";
        $resultado = Conexao::getConexao()->fetch($sql);
        $array = array();
        foreach ($resultado as $key => $value) {
            $tar = new Tarefa($value->tar_titulo, $value->tar_horas_estimada);
            $tar->setId($value->tar_id);
            $tar->setCodigo($value->tar_codigo);
            $tar->setDescricao($value->tar_descricao);
            $tar->setColaborador($value->tar_colaborador);
            $tar->setBug($value->tar_bug);
            $tar->setTarefaBug($value->tar_tarefa_bug);
            $tar->setdataCriacao($value->tar_data_criacao);
            $tar->setdataIniciada($value->tar_data_iniciada);
            $tar->setDataFinalizada($value->tar_data_finalizada);
            $tar->sethorasLancada($value->tar_horas_lancada);
            array_push($array, $tar);
        }
        return $array;
    }
}
