<?php

require_once('./../repository/ColaboradorRepository.php');

class ColaboradorFactory {
    
    private static $colaboradorRepository;
    
    private function __construct() {}
    private function __wakeup(){}
    private function __clone(){}
    
    public static function repository(){
        if(self::$colaboradorRepository === null){
            self::$colaboradorRepository = new ColaboradorRepository();
        }
        return self::$colaboradorRepository;
    }
}

?>