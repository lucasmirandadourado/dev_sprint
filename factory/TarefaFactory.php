<?php
require_once(dirname(__FILE__).'/../repository/TarefaRepository.php');
require_once(dirname(__FILE__).'/../service/TarefaService.php');

class TarefaFactory {

    private static $tarefaRepository;
    private static $tarefaService;

    private function __construct(){}
    private function __wakeup() {}
    private function __clone() {}

    public static function repository() {
        if (self::$tarefaRepository === null) {
            self::$tarefaRepository = new TarefaRepository();
        }
        return self::$tarefaRepository;
    }

    public static function service() {
        if(self::$tarefaService === null) {
            self::$tarefaService = new TarefaService();
        }
        return self::$tarefaService;
    }
}

