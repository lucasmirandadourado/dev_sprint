<?php 

require_once('colaborador.php');

class Tarefa {

    private $id;
private $titulo;    private $descricao;
    private $colaborador;
    private $bug;
    private $tarefa_bug;
    private $data_criacao;
    private	$data_iniciada;
    private	$data_finalizada;
    private	$horas_estimada;
    private	$horas_lancada;
 
    public function __construct($titulo, $horas_estimada) {
        $this->titulo = $titulo;
        $this->horas_estimadas = $horas_estimada;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of colaborador
     */ 
    public function getColaborador()
    {
        return $this->colaborador;
    }

    /**
     * Set the value of colaborador
     *
     * @return  self
     */ 
    public function setColaborador($colaborador) {
        $this->colaborador = $colaborador;

        return $this;
    }

    /**
     * Get the value of bug
     */ 
    public function getBug() {
        return $this->bug;
    }

    /**
     * Set the value of bug
     *
     * @return  self
     */ 
    public function setBug($bug)
    {
        $this->bug = $bug;

        return $this;
    }

    /**
     * Get the value of tarefa_bug
     */ 
    public function getTarefa_bug()
    {
        return $this->tarefa_bug;
    }

    /**
     * Set the value of tarefa_bug
     *
     * @return  self
     */ 
    public function setTarefa_bug($tarefa_bug)
    {
        $this->tarefa_bug = $tarefa_bug;

        return $this;
    }

    /**
     * Get the value of data_criacao
     */ 
    public function getData_criacao()
    {
        return $this->data_criacao;
    }

    /**
     * Set the value of data_criacao
     *
     * @return  self
     */ 
    public function setData_criacao($data_criacao)
    {
        $this->data_criacao = $data_criacao;

        return $this;
    }

    /**
     * Get the value of data_iniciada
     */ 
    public function getData_iniciada()
    {
        return $this->data_iniciada;
    }

    /**
     * Set the value of data_iniciada
     *
     * @return  self
     */ 
    public function setData_iniciada($data_iniciada)
    {
        $this->data_iniciada = $data_iniciada;

        return $this;
    }

    /**
     * Get the value of data_finalizada
     */ 
    public function getData_finalizada()
    {
        return $this->data_finalizada;
    }

    /**
     * Set the value of data_finalizada
     *
     * @return  self
     */ 
    public function setData_finalizada($data_finalizada)
    {
        $this->data_finalizada = $data_finalizada;

        return $this;
    }

    /**
     * Get the value of horas_estimadas
     */ 
    public function getHoras_estimada()
    {
        return $this->horas_estimada;
    }

    /**
     * Set the value of horas_estimada
     *
     * @return  self
     */ 
    public function setHoras_estimada($horas_estimada) {
        $this->horas_estimada = $horas_estimada;

        return $this;
    }

    /**
     * Get the value of horas_lancadas
     */ 
    public function getHoras_lancada() {
        return $this->horas_lancada;
    }

    /**
     * Set the value of horas_lancadas
     *
     * @return  self
     */ 
    public function setHoras_lancada($horas_lancada) {
        $this->horas_lancada = $horas_lancada;

        return $this;
    }
}