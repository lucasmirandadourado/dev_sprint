<?php

function converterFormEmArray($form) {
    $formulario = array();
    foreach ($form as $key => $value) {
        if(strpos($value['name'], '[]')) {
            $formulario[$value['name']][] = $value['value'];
        } else $formulario[$value['name']] = trim($value['value']);
    }
    return $formulario;
}

function validarCampo($tipo, $valor) {
    try {
        if($tipo=="integer") {
            
            if(!is_numeric($valor)) throw new Exception("Não é um valor válido.", 999);
            if(empty($valor)) throw new Exception("Informe o código do Sprint.", 998);
            if($valor <= 0) throw new Exception("Sprint inválido.", 998);
    
            return ['status'=>true];       
        } 
    } catch (\Throwable $th) {
        return ['status' => false, "Mensagem"=>$th->getMessage()]; 
    }

}