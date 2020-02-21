<?php
require_once(dirname(__FILE__).'/../repository/SprintRepository.php');
require_once(dirname(__FILE__).'/../repository/TarefaRepository.php');
require_once(dirname(__FILE__).'/../service/SprintService.php');

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

    public static function service() {
        if(self::$sprintService === null) {
            self::$sprintService = new SprintService();
        }
        return self::$sprintService;
    }
}
