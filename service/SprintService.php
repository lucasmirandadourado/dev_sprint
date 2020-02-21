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
                var_dump($formulario);
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

    public static function buscarInfoSprint($id)
    {
        $sprintDao = SprintFactory::repository()->buscarInfoSprint($id);

        $tarefaDao = new TarefaRepository();
        $tarefas = $tarefaDao->findAllBySprint($id);
        $sprint = new Sprint($sprintDao->getNome(), $sprintDao->getDataInicio(), $sprintDao->getDataInicio(), $sprintDao->getQtdCol());
        $sprint->setId($sprintDao->getId());
        foreach ($tarefas as $tarefa) {
            $sprint->addTarefa($tarefa);
        }
        return $sprint;
    }

    public static function findAll() {
        return SprintFactory::repository()->findAll();        
    }
}
