<?php
require_once('./../repository/TarefaRepository.php');

class TarefaFactory
{

    private static $tarefaRepository;

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
        if (self::$tarefaRepository === null) {
            self::$tarefaRepository = new TarefaRepository();
        }
        return self::$tarefaRepository;
    }
}

if (isset($_POST['buscarTarefas'])) {
    $buscar = TarefaFactory::repository()->findAll($_POST['buscarTarefas']);  
    echo json_encode($buscar);    
    exit;
}
