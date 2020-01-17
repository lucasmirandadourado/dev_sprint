<?php 
require_once('tarefa.php');

class Sprint {

    private $id;
	private $nome;
	private $dataInicio;
	private $dataFim;
	private $qtdCol;
	private $dateDiasSprint;
	private $tarefa = array();
    
    public function __construct($nome, $data_inicio, $data_fim, $qtd_col) {
        $this->nome = $nome;
        $this->dataInicio = $data_inicio;
        $this->dataFim = $data_fim;
        $this->qtdCol = $qtd_col;
    }

    public function getId(){
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

	public function getDataInicio()	{
		return $this->dataInicio;
	}

	public function setDataInicio($data_inicio) {
		$this->dataInicio = $data_inicio;
	}

	public function getDataFim() {
		return $this->dataFim;
	}

	public function setDataFim($data_fim) {
		$this->dataFim = $data_fim;
	}

	public function getQtdCol() {
		return $this->qtdCol;
	}

	public function setQtdCol($qtd_col) {
		$this->qtdCol = $qtd_col;
	}

    public function getDateDiasSprint() {
        return $this->dateDiasSprint;
    }

    public function setDateDiasSprint($date_dias_sprint) {
        $this->dateDiasSprint = $date_dias_sprint;
    }

	public function getTarefa()	{
		return $this->tarefa;
	}

	public function setTarefa($tarefa) {
		$this->tarefa = $tarefa;
	}

	public function addTarefa($tarefa) {
		array_push($this->tarefa, $tarefa);
	}
}