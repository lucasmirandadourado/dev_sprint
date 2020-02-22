<?php

require_once(dirname(__FILE__).'/../factory/ConexaoFactory.php');
require_once('./../model/Sprint.php');

class SprintRepository
{

    public function __construct() {}
    private function __wakeup() {}
    private function __clone() {}

    public function findAll()
    {
        $sql = "select *, 
        (select case when SUM(date_part('hour', tar_horas_estimada::time)) = 0 then 0 else SUM(date_part('hour', tar_horas_estimada::time)) end
                from tarefa where tar_sprint = sprint.spt_id) as horas,
            (select case when count(*) = 0 then 0 else count(*) end from tarefa where tar_sprint = sprint.spt_id) as qtd_tarefas
        from sprint order by spt_data_inicio desc;";
        $sprints = Conexao::getConexao()->fetch($sql);
        $lista = array();
        foreach ($sprints as $key => $value) {
            
            $id = $value->spt_id;
            $nome = $value->spt_nome;
            $data_inicio = $value->spt_data_inicio;
            $data_fim = $value->spt_data_fim;
            $qtd_col = $value->spt_qtd_colaborador;
            $horas = $value->horas;
            $qtd_taretas = $value->qtd_tarefas;
            
            $sprint = new Sprint($nome, $data_inicio, $data_fim, $qtd_col);
                $sprint->setId($id);
                $sprint->setHoras($horas);
                $sprint->setQtdTarefas($qtd_taretas);

            array_push($lista, $sprint);
        }
        return $lista;
    }

    public function save(Sprint $sprint)
    {
        $data_inicio = new DateTime($sprint->getDataInicio());
        $data_fim = new DateTime($sprint->getDataFim());
        $sql = "INSERT INTO sprint(
            spt_nome, 
            spt_data_inicio, 
            spt_data_fim, 
            spt_qtd_colaborador)
        VALUES ('" .
            $sprint->getNome() . "', '" .
            $data_inicio->format('yy-m-d') . "', '" .
            $data_fim->format('yy-m-d') . "', " .
            $sprint->getQtdCol() . ") returning spt_id;";

        $return = Conexao::getConexao()->fetch($sql);
        
        foreach ($sprint->getDatas() as $key => $value) {
            $sqlDias = "INSERT INTO dias_sprint(
                data, sprint_id)
                VALUES ('$value', " . $return[0]->spt_id . ");";
            $r = Conexao::getConexao()->fetch($sqlDias);
        }
        return  $return === false ? false : array(true, $return['spt_id']);
    }

    public function buscarInfoSprint($id)
    {
        $sql = "SELECT * FROM sprint where spt_id = $id;";
        $sprintDao = Conexao::getConexao()->fetch($sql);

        $id = $sprintDao[0]->spt_id;
        $nome = $sprintDao[0]->spt_nome;
        $data_inicio = $sprintDao[0]->spt_data_inicio;
        $data_fim = $sprintDao[0]->spt_data_fim;
        $qtd_col = $sprintDao[0]->spt_qtd_colaborador;

        $sprint = new Sprint($nome, $data_inicio, $data_fim, $qtd_col);
        $sprint->setId($id);
        return $sprint;
    }

    public function find($id) {
        $sql = "select *, 
        (select case when SUM(date_part('hour', tar_horas_estimada::time)) = 0 then 0 else SUM(date_part('hour', tar_horas_estimada::time)) end
                from tarefa where tar_sprint = sprint.spt_id) as horas,
            (select case when count(*) = 0 then 0 else count(*) end from tarefa where tar_sprint = sprint.spt_id) as qtd_tarefas
        from sprint where spt_id = $id  order by spt_data_inicio desc;";
        $result = Conexao::getConexao()->fetch($sql);
        if(count($result) > 0) {
            $spt = $result[0];    
            $sprint = new Sprint($spt->spt_nome, $spt->spt_data_inicio, $spt->spt_data_fim, $spt->spt_qtd_colaborador);
            $sprint->setQtdTarefas($spt->qtd_tarefas);
            $sprint->setHoras($spt->horas);
            $sprint->setId($spt->spt_id);
            return $spt;
        }
    }
}
