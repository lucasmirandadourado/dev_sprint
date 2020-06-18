<?php 

require_once(dirname(__FILE__).'/../model/Tarefa.php');

class TarefaService {

    public function criarTarefa($form) {
        try {
            if(empty($form['salvarTarefa'])) throw new Exception("Informe o número do Sprint");
            $validar = validarCampo("integer", $form['salvarTarefa']);
            if($validar['status'] == false) return $validar;
        
            $tarefa = new Tarefa(null, null);
            try {
                foreach ($form as $key => $value) {
                    
                    if($key == "codigo") {
                        validarCampo('string', $value, 'Informe o código da tarefa');
                        $tarefa->setCodigo($value);
                    }

                    if($key == 'tempoEstimativa') {
                        validarCampo('time', $value, 'Informe uma estimativa de tempo');
                        // $tarefa->setHorasEstimada(converterStringParaHora($value));
                    }
                    // if($value['name'] == 'titulo') {
                    //     $tarefa->setTitulo($value['value']);
                    // }
                    // if($value['name'] == 'descricao') {
                    //     $tarefa->setDescricao($value['value']);
                    // }
                    // if($value['name'] == 'bug') {
                    //     $tarefa->setBug($value['value']);
                    // }
                    // if($value['name'] == 'tarefa_bug') {
                    //     $tarefa->setBug($value['value']);
                    // }
                    // if($value['name'] == 'tarefas_bug') {
                    //     $tarefa->setTarefaBug($value['value']);
                    // }
                }
            } catch (\Throwable $th) {
                return ['status' => false, "Mensagem"=>$th->getMessage()];     
            }
            exit;
            $mensagem = array();
            if($tarefa->getTitulo() < 3) {
                array_push($mensagem, array("titulo" => "É necessário adicionar título com melhor descrição."));
            }
            if($tarefa->getDescricao() < 10) {
                array_push($mensagem, array("descricao" => "É necessário inserir uma descrição da tarefa."));
            }
            if($tarefa->getHorasEstimada()) {
                array_push($mensagem, array("titulo" => "Informe a estimativa da tarefa."));
            }
            if(empty($tarefa->getCodigo())) {
                array_push($mensagem, array("titulo" => "É necessário adicionar código da tarefa."));
            }
            
            return TarefaFactory::repository()->save($tarefa, $form['salvarTarefa']);
        } catch (\Throwable $th) {
            return ['status'=>false, 'mensagem' => $th->getMessage()];
        }
    }

    public function delete($id) {
        $tarefa = new TarefaRepository();
        return $tarefa->delete($id);
    }

    public function buscarTarefaSelect() {
        return TarefaFactory::repository()->buscarTarefaSelect();
    }
}
