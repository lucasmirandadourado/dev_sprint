<?php 
require_once(dirname(__FILE__).'/../model/Tarefa.php');

class Sprint  implements JsonSerializable {

	private $id;
	private $nome;
	private $dataInicio;
	private $dataFim;
	private $qtdCol;
	private $tarefa = array();
	private $dias = array();
	private $horas;
	private $qtdTarefas;
    
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

	public function getTarefa()	{
		return $this->tarefa;
	}

	public function setTarefa($tarefa) {
		$this->tarefa = $tarefa;
	}

	public function addTarefa($tarefa) {
		array_push($this->tarefa, $tarefa);
	}

	public function getDatas() {
		return $this->dias;
	}

	public function addDia($data) {
		array_push($this->dias, $data);
	}

	public function getHoras(){
		return $this->horas;
	}

	public function setHoras($horas) {
		$this->horas = $horas;
	}

	public function getQtdTarefas() {
		return $this->qtdTarefas;
	}

	public function setQtdTarefas($QtdTarefas) {
		$this->qtdTarefas = $QtdTarefas;
	}

	public function jsonSerialize() {
        return [
            'id'   => $this->getId(),
			'name' => $this->getNome(),
			'data_inicio' => $this->getDataInicio(),
			'data_fim' => $this->getDataFim(),
			'qtd_colaboradores' => $this->getQtdCol(),
			'tarefas' => $this->getTarefa(),
			'horas' => $this->getHoras(), 
			'qtd_tarefas' => $this->getQtdTarefas(),
			'dias' => $this->getDatas()
		];
    }
}