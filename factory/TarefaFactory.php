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

