<?php

require_once(dirname(__FILE__).'/../model/Tarefa.php');
require_once(dirname(__FILE__).'/../factory/SprintFactory.php');

class SprintService {

    public function __construct() { }

    public static function cadastrarSprint($form) {
        $dias = array();
        $nome = $form['nome'];
        $qtd = $form['qtdDiasSprint'];

        array_shift($form);
        array_shift($form);
        array_shift($form);
        array_pop($form);

        foreach ($form as $key => $value) {
            array_push($dias, $value);
        }
        $json_dias = json_encode($dias);
        $sprint = new Sprint($nome, $dias[0], $dias[$qtd-1], 5);
        $result = SprintFactory::repository()->save($sprint);
        return $result;
    }

    public static function buscarInfoSprint($id) {
        $sprintDao = SprintFactory::repository()->buscarInfoSprint($id);
       
        $tarefaDao = new TarefaRepository();
        $tarefas = $tarefaDao->findAll($id);

        $sprint = new Sprint($sprintDao->getNome(), $sprintDao->getDataInicio(), $sprintDao->getDataInicio(), $sprintDao->getQtdCol());
        $sprint->setId($sprintDao->getId());
        foreach ($tarefas as $tarefa) {
            $sprint->addTarefa($tarefa);
        }
        return $sprint;
    }
}
