<?php

require_once(dirname(__FILE__).'/../model/Tarefa.php');
require_once(dirname(__FILE__).'/../factory/SprintFactory.php');

class SprintService {

    public function __construct() { }

    public static function cadastrarSprint($form) {
        $sprint = $form['sprint'];
        $tarefas = $form['tarefas'];
        // var_dump($sprint);
        $spt = new Sprint($sprint['nome'], $sprint['dataInicio'], $sprint['dataTermino'], $sprint['qtdDev']);
        SprintFactory::repository()->save($spt);

        // foreach ($tarefas as $tarefa) {
        
        //     $tar = new Tarefa($tarefa['titulo'], $tarefa['horasEstimada']);
        //     $tar->setCodigo($tarefa['codigo']);
        //     $tar->setDescricao($tarefa['descricao']);
            
        //     TarefaFactory::repository()->save($tar);
        // }
        return '';
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
