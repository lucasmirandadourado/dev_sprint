<?php

require_once(dirname(__FILE__).'/../model/Tarefa.php');

class SprintService {

    public function __construct() {
        $tarefa = new Tarefa("Titulo", '2:00');
        $tarefa->setCodigo('2012');
        $tarefa->setDescricao("Descricao da tarefa");
        $tarefa->setHorasEstimada('2:00');
        echo $this->gerarRow($tarefa);

    }

    public function gerarRow(Tarefa $tarefa) {
        return "<tr>
                    <th>".$tarefa->getCodigo()."</th>
                    <th>".$tarefa->getTitulo()."</th>
                    <th>".$tarefa->getDescricao()."</th>
                    <th>".$tarefa->getHorasEstimada()."</th>
                    <th class='acoes'>
                    <a href='#'><img id='editar' data-id='".$tarefa->getId()."' src='../asset/icon/edit-24px.svg'></a>
                    <a href='#'><img id='excluir' data-id='".$tarefa->getId()."' src='../asset/icon/close-24px.svg'></a>
                    </th>
                </tr>";
    }
}

$tar = new SprintService();
