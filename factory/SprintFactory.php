<?php
// var_dump($_POST);
require_once('./../repository/SprintRepository.php');
require_once('./../repository/TarefaRepository.php');

class SprintFactory
{

    private static $sprintRepository;
    private static $sprintService;

    private function __construct() {}
    private function __wakeup() {}
    private function __clone() {}

    public static function repository() {
        if (self::$sprintRepository === null) {
            self::$sprintRepository = new SprintRepository();
        }
        return self::$sprintRepository;
    }

    public static function serice() {
        if(self::$sprintService === null) {
            self::$sprintService = new SprintService();
        }
        return self::$sprintService;
    }
}
