<?php

require_once(dirname(__FILE__) . '/../model/Tarefa.php');
require_once(dirname(__FILE__) . '/../factory/SprintFactory.php');

class SprintService
{

    public function __construct()
    {
    }

    public static function cadastrarSprint($form)
    {
        $sprint = $form['sprint'];
        $nome = $sprint['nome'];
        $qtdDev = $sprint['qtdDev'];
        $dias = $sprint['dias'];
        $datas = $sprint['datas'];

        $spt = new Sprint($nome, $datas[0]['value'], $datas[$dias - 1]['value'], $qtdDev);
        if (count($datas) > 0) {
            foreach ($datas as $key => $value) {
                $spt->addDia($value['value']);
            }

            return SprintFactory::repository()->save($spt);
        }
    }

    public static function buscarInfoSprint($id)
    {
        $sprintDao = SprintFactory::repository()->buscarInfoSprint($id);

        $tarefaDao = new TarefaRepository();
        $tarefas = $tarefaDao->findAllBySprint($id);
        var_dump($tarefas);
        $sprint = new Sprint($sprintDao->getNome(), $sprintDao->getDataInicio(), $sprintDao->getDataInicio(), $sprintDao->getQtdCol());
        $sprint->setId($sprintDao->getId());
        foreach ($tarefas as $tarefa) {
            $sprint->addTarefa($tarefa);
        }
        return $sprint;
    }
}
