<?php 

require_once('colaborador.php');

class Tarefa implements JsonSerializable {

    private $id;
    private $titulo;    
    private $descricao;
    private $colaborador;
    private $bug;
    private $tarefaBug;
    private $dataCriacao;
    private	$dataIniciada;
    private	$dataFinalizada;
    private	$horasEstimada;
    private	$horasLancada;
 
    public function __construct($titulo, $horasEstimada) {
        $this->titulo = $titulo;
        $this->horasEstimadas = $horasEstimada;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getColaborador() {
        return $this->colaborador;
    }

    public function setColaborador($colaborador) {
        $this->colaborador = $colaborador;
    }

    public function getBug() {
        return $this->bug;
    }

    public function setBug($bug) {
        $this->bug = $bug;
    }

    public function getTarefaBug(){
        return $this->tarefaBug;
    }

    public function setTarefaBug($tarefaBug){
        $this->tarefaBug = $tarefaBug;
    }

    public function getdataCriacao() {
        return $this->dataCriacao;
    }

    public function setdataCriacao($dataCriacao){
        $this->dataCriacao = $dataCriacao;
    }

    public function getdataIniciada() {
        return $this->dataIniciada;
    }

    public function setdataIniciada($dataIniciada){
        $this->dataIniciada = $dataIniciada;
    }

    public function getDataFinalizada() {
        return $this->dataFinalizada;
    }

    public function setDataFinalizada($dataFinalizada) {
        $this->dataFinalizada = $dataFinalizada;
    }

    public function gethorasEstimada() {
        return $this->horasEstimada;
    }

    public function sethorasEstimada($horasEstimada) {
        $this->horasEstimada = $horasEstimada;
    }

    public function gethorasLancada() {
        return $this->horasLancada;
    }

    public function sethorasLancada($horasLancada) {
        $this->horasLancada = $horasLancada;
    }

    public function jsonSerialize() {
        return [            
				'id' => $this->getId(),
				'titulo' => $this->getTitulo(),
                'descricao' => $this->getDescricao(),
                'colaborador' => $this->getColaborador(),
				'bug' => $this->getBug(),
				'tarefa_bug' => $this->getTarefaBug(),
				'data_criacao' => $this->getdataCriacao(),
                'data_iniciada' => $this->getdataIniciada(),
                'data_finalizacao' => $this->getDataFinalizada(),
                'hora_estimada' => $this->gethorasEstimada(),
                'horas_lancadas' => $this->gethorasLancada()			
        ];
    }
}