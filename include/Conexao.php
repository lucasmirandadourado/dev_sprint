<?php

class Conexao
{
    private static $pdo;

    private function __construct()
    {
    }

    public static function getConexao()
    {
        $envPath = realpath(dirname(__FILE__)."/env.ini");
        $env = parse_ini_file($envPath);
        
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO("pgsql:host=" . $env['host']
                    . "; dbname=" . $env['basename'] . ";", $env['user'], $env['password'], null);
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        return self::$pdo;
    }

    public static function fetch($sql)
    {
        try {
            $conn = Conexao::getConexao();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (\Throwable $th) {
            return "Erro: " . $th->getMessage();
        }
    }

    public static function fetchAll($sql)
    {
        try {
            $conn = Conexao::getConexao();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            return "Erro: " . $th->getMessage();
        }
    }

    public static function query($sql) {
        try {
            $conn = Conexao::getConexao();
            return $conn->query($sql);
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
