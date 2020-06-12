<?php

require_once(dirname(__FILE__) . '/../model/Tarefa.php');
require_once(dirname(__FILE__) . '/../factory/SprintFactory.php');
require_once(dirname(__FILE__).'/../util/uteis.php');

class SprintService
{

    public function __construct() {}

    public static function cadastrarSprint($form)
    {
        $formulario = converterFormEmArray($form['cadastrarSprint']);
        $validar = self::validacaoFormulario($formulario);
        if(!$validar['status']) return $validar;
        
        $nome = $formulario['nome'];
        $qtdDev = $formulario['qtdDevs'];
        $dias = $formulario['dias'];
        $datas = $formulario['data[]'];
        
        $spt = new Sprint($nome, $datas[0], $datas[$dias - 1], $qtdDev);
        
        if (count($datas) > 0) {
            foreach ($datas as $key => $value) {
                $spt->addDia($value);
            }
            $spt->setDataFim(end($spt->getDatas()));
        }
        
        // FIXME: Bug quando for criar o objeto. Verificar as datas.
        return SprintFactory::repository()->save($spt);
    }

    public static function buscarInfoSprint($id) {

        $validar = validarCampo("integer", $id);
        if(!$validar['status']) return $validar;

        $sprintDao = SprintFactory::repository()->buscarInfoSprint($id);
        if(!$sprintDao['status']) return $sprintDao;

        $tarefas = TarefaFactory::repository()->findAllBySprint($id);

        $spt = $sprintDao['mensagem'];
        $sprint = new Sprint($spt->getNome(), $spt->getDataInicio(), $spt->getDataInicio(), $spt->getQtdCol());
        $sprint->setId($spt->getId());
        $horas_estimadas_total = 0;
        foreach ($tarefas as $tarefa) {
            $sprint->addTarefa($tarefa);
            $horas_estimadas_total =+ date('h:i:s', $tarefa->getHorasEstimada());
        }
        $sprint->setHoras($horas_estimadas_total);
        return $sprint;
    }

    public static function find($id) {
        $validar = validarCampo("integer", $id);
        if($validar['status'] == false) return $validar;
        return SprintFactory::repository()->find($id);    
    }

    public static function findAll() {
        return SprintFactory::repository()->findAll();        
    }

    public static function delete($id) {
        return SprintFactory::repository()->delete($id);
    }

    public static function deleteDia($id, $spt) {
        return SprintFactory::repository()->deleteDia($id, $spt);
    }

    public static function addDia($spt, $data) {
        return SprintFactory::repository()->addDia($spt, $data);
    }

    public static function buscarListaSprint() {
        return SprintFactory::repository()->buscarListaSprint();
    }

    private static function validacaoFormulario($formulario) {
        $status = true;
        $mensagem = '';

        $dicionario = array(
            "nome" => "Não foi informado o nome.<br>",
            "qtdDevs" => "Não foi informado a quantidade de desenvolvedores.<br>",
            "qtdDiasSprint" => "Não foi informado a quantidade de dias no Sprint.<br>",
            "data" => "É necessário adicionar os dias."
        );
        foreach ($formulario as $key => $value) {
            if(empty($value)) {
                $mensagem .= $dicionario[$key];
                $status = false;                
            }
        }
        return array('status' => $status, 'mensagem' => $mensagem);
    }
}
