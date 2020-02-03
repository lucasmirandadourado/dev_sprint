<?php 

class Colaborador implements JsonSerializable {

    private $id;
    private $nome;
    private $login;
    private $funcao = 'desenvolvedor';
    private $senha;
    private $status;

    public function __construct($nome, $senha) {
        $this->nome = $nome;
        $this->senha = $senha;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getFuncao() {
        return $this->funcao;
    }

    public function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function jsonSerialize() {
        return [
            "id" => $this->id,
            "nome" => $this->nome,
            "login" => $this->login,
            "funcao" => $this->funcao,
            "senha" => $this->senha,
            "status" => $this->status
        ];
    }
}