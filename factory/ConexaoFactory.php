<?php 

require_once(dirname(__FILE__).'/../include/class.Postgre.php');

class Conexao {

    static private $conexao;

    private function __construct() {}

    private function __wakeup() {}
    private function __clone() {}

    public function getConexao() {
        if(self::$conexao == null) {
            $envPath = realpath(dirname(__FILE__) . "/../include/env.ini");
            $env = parse_ini_file($envPath);
            self::$conexao = new Postgre($env['host'], $env['database'], $env['port'], $env['user'], $env['password']);
            self::$conexao->connect();
        }
        return self::$conexao;
    }
}
