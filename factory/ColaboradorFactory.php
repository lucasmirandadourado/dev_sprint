<?php

require_once(dirname(__FILE__).'/../repository/ColaboradorRepository.php');
require_once(dirname(__FILE__).'/../service/ColaboradorService.php');

class ColaboradorFactory {
    
    private static $colaboradorRepository;
    private static $colaboradorService;
    
    private function __construct() {}
    private function __wakeup(){}
    private function __clone(){}
    
    public static function repository(){
        if(self::$colaboradorRepository === null){
            self::$colaboradorRepository = new ColaboradorRepository();
        }
        return self::$colaboradorRepository;
    }
    
    public static function service(){
        if(self::$colaboradorService === null){
            self::$colaboradorService = new ColaboradorService();
        }
        return self::$colaboradorService;
    }


}

?>