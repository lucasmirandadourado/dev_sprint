<?php
require_once('class.Bd.php');

class Postgre extends Bd
{

    public function __construct($host, $database, $port, $user, $password) {

        if ($this->validaParametros($host, $user, $database)) {
            $this->host = $host;
            $this->database = $database;
            $this->port = $port;
            $this->user = $user;
            $this->password = base64_encode($password);
            $this->flagParametros = true;
        } else {
            $this->flagParametros = false;
        }
    }

    public function connect()
    {
        if ($this->flagParametros) {

            $v = "pgsql:host="     . $this->host
                . ";port="     . $this->port
                . ";dbname="   . $this->database
                . ";user="     . $this->user
                . ";password=" . base64_decode($this->password) . "";

            $this->connection = new PDO($v);
            if ($this->connection) {
                $this->connected = true;
            }
            
            return $this->connection;
        }
    }

    public function disconnect()
    {
        if (pg_close($this->connection)) {
            $this->connected = false;
            $this->connection = null;
        }
        return !$this->connected;
    }

    public function &getConnection()
    {
        if (!$this->connected) {
            $this->connect();
        }
        return $this->connection;
    }

    public function query($sql = null)
    {
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function fetch($sql = null) {
        $rs = $this->connection->query($sql);
        $array = array();
        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
            array_push($array, $linha);
        }
        return $array;
    }
}