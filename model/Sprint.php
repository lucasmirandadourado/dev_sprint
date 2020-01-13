<?php 
require_once('tarefa.php');

class Sprint {

    private $id;
	private $nome;
	private $dataInicio;
	private $dataFim;
	private $qtdCol;
    private $dateDiasSprint;
    
    public function __construct($nome, $data_inicio, $data_fim, $qtd_col) {
        $this->nome = $nome;
        $this->dataInicio = $data_inicio;
        $this->dataFim = $data_fim;
        $this->qtdCol = $qtd_col;
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

	/**
	 * Get the value of nome
	 */ 
	public function getNome() {
		return $this->nome;
	}

	/**
	 * Set the value of nome
	 *
	 * @return  self
	 */ 
	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}

	/**
	 * Get the value of data_inicio
	 */ 
	public function getDataInicio()	{
		return $this->dataInicio;
	}

	/**
	 * Set the value of data_inicio
	 *
	 * @return  self
	 */ 
	public function setDataInicio($data_inicio) {
		$this->dataInicio = $data_inicio;
		return $this;
	}

	/**
	 * Get the value of data_fim
	 */ 
	public function getDataFim() {
		return $this->dataFim;
	}

	/**
	 * Set the value of data_fim
	 *
	 * @return  self
	 */ 
	public function setDataFim($data_fim) {
		$this->dataFim = $data_fim;
		return $this;
	}

	/**
	 * Get the value of qtd_col
	 */ 
	public function getQtdCol() {
		return $this->qtdCol;
	}

	/**
	 * Set the value of qtd_col
	 *
	 * @return  self
	 */ 
	public function setQtdCol($qtd_col) {
		$this->qtdCol = $qtd_col;
		return $this;
	}

    /**
     * Get the value of date_dias_sprint
     */ 
    public function getDateDiasSprint() {
        return $this->dateDiasSprint;
    }

    /**
     * Set the value of date_dias_sprint
     *
     * @return  self
     */ 
    public function setDateDiasSprint($date_dias_sprint) {
        $this->dateDiasSprint = $date_dias_sprint;
        return $this;
    }
}