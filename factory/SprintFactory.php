<?php
// var_dump($_POST);
require_once('./../repository/SprintRepository.php');
require_once('./../repository/TarefaRepository.php');

class SprintFactory
{

    private static $sprintRepository;

    private function __construct()
    {
    }
    private function __wakeup()
    {
    }
    private function __clone()
    {
    }

    public static function repository()
    {
        if (self::$sprintRepository === null) {
            self::$sprintRepository = new SprintRepository();
        }
        return self::$sprintRepository;
    }

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
        $result = self::repository()->save($sprint);
        return $result;
    }

    public static function buscarInfoSprint($id) {
        $sprintDao = self::repository()->buscarInfoSprint($id);
       
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
