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

    public function findAllBySprint($id){
        $validar = validarCampo('integer', $id);
        if(!$validar['status']) return $validar;
        $sprint = SprintFactory::repository()->buscarInfoSprint($id);

        $sql = "select * from tarefa where tar_sprint = $id";
        $resultado = Conexao::getConexao()->fetch($sql);

        if(count($resultado) > 0) {
            $spt = [];
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
                array_push($spt, $tar);
            }
            return $spt;
        }
        return array();
    }

    public function save(Tarefa $tarefa, $id)
    {
        $sql = "INSERT INTO tarefa(
                tar_titulo, tar_descricao, tar_colaborador, tar_bug, 
                tar_tarefa_bug, tar_data_criacao, tar_data_iniciada, tar_data_finalizada, 
                tar_horas_estimada, tar_horas_lancada, tar_sprint, tar_codigo)
            VALUES ('" . $tarefa->getTitulo() . "', '" . $tarefa->getDescricao() . "', null, '".($tarefa->getBug() == null ? 'false' : $tarefa->getBug())."', 
                ".($tarefa->getTarefaBug() == null ? 'null' : $tarefa->getTarefaBug()).", now()::date, null, null, 
                '" . date("h:s:i", $tarefa->getHorasEstimada()) . "', null, $id, '" . $tarefa->getCodigo() . "') RETURNING tar_id;";
        $query = Conexao::getConexao()->fetch($sql);
        $tarefa->setId($query[0]->tar_id);
        if ($query === false) {
            return false;
        } else return $tarefa;
    }

    public function find($id) {

        $sql = "select * from tarefa as tar
        left join colaborador as col on col.col_id = tar.tar_colaborador
        where tar_id = $id ";
        $resultado = Conexao::getConexao()->fetch($sql);
        if(count($resultado) > 0 ) {
            $tar = new Tarefa($resultado[0]->tar_titulo, $resultado[0]->tar_horas_estimada);
            $tar->setId($resultado[0]->tar_id);
            $tar->setCodigo($resultado[0]->tar_codigo);
            $tar->setDescricao($resultado[0]->tar_descricao);
            $tar->setColaborador($resultado[0]->tar_colaborador);
            $tar->setBug($resultado[0]->tar_bug);
            $tar->setTarefaBug($resultado[0]->tar_tarefa_bug);
            $tar->setdataCriacao($resultado[0]->tar_data_criacao);
            $tar->setdataIniciada($resultado[0]->tar_data_iniciada);
            $tar->setDataFinalizada($resultado[0]->tar_data_finalizada);
            $tar->sethorasLancada($resultado[0]->tar_horas_lancada);
            return $tar;
        } else return false;
    }

    public function delete($id) {
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

    public function buscarTarefaSelect() {
        $sql = "SELECT tar_id as id, tar_codigo || ' - ' || tar_titulo as text FROM tarefa order by tar_id desc";
        return Conexao::getConexao()->fetch($sql);
    }
}
