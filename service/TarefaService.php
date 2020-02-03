<?php 

require_once(dirname(__FILE__).'/../model/Tarefa.php');

class TarefaService {

    public function criarTarefa($form) {
        $tar = $form['tarefa'];

        $tarefa = new Tarefa(null, null);
        foreach ($tar as $key => $value) {
            if($value['name'] == 'codigo') {
                $tarefa->setCodigo($value['value']);
            }
            if($value['name'] == 'tempoEstimativa') {
                $tarefa->setHorasEstimada($value['value']);
            }
            if($value['name'] == 'titulo') {
                $tarefa->setTitulo($value['value']);
            }
            if($value['name'] == 'descricao') {
                $tarefa->setDescricao($value['value']);
            }
        }
        $mensagem = array();
        if($tarefa->getTitulo() < 3) {
            array("titulo" => "É necessário adicionar título com melhor descrição.");
        }
        if($tarefa->getDescricao() < 10) {
            array("descricao" => "É necessário inserir uma descrição da tarefa.");
        }
        if($tarefa->getHorasEstimada()) {
            array("titulo" => "Informe a estimativa da tarefa.");
        }
        if(empty($tarefa->getCodigo())) {
            array("titulo" => "É necessário adicionar código da tarefa.");
        }
        
        return TarefaFactory::repository()->save($tarefa, $form['salvarTarefa']);
    }
}

?>