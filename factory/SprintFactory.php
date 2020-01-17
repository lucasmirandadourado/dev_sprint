<?php
// var_dump($_POST);
require_once('./../repository/SprintRepository.php');

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
}

if (isset($_POST['buscarSprint'])) {
    $buscar = SprintFactory::repository()->findAll();
    
    $select = `<option>Selecione o Sprint</option>`;
    foreach($buscar as $item) {
        $select .=  "<option data-id=".$item->getId().">".$item->getNome()."</option>";
    }
    echo $select;
    exit;
}
