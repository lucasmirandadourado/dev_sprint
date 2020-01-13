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
    $row = "";
    foreach ($buscar as $key => $value) {
        $data = new DateTime($value->getDataInicio());
        $row .="<tr>
                    <td>".$value->getId()."</td>
                    <td>".$value->getNome()."</td>
                    <td>".$value->getQtdCol()."</td>
                    <td>".$data->format('d/m/Y')."</td>
                </tr>";
    }
    echo $row;
    exit;
}
