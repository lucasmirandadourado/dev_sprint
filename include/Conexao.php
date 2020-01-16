<?php

define('HOST', 'localhost');
define('DBNAME', 'dev_sprint');
define('USER', 'postgres');
define('PASSWORD', 'postgres');

class Conexao
{
    private static $pdo;

    private function __construct()
    {
    }

    public static function getConexao()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO("pgsql:host=" . HOST
                    . "; dbname=" . DBNAME . ";", USER, PASSWORD, null);
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
