<?php
class Util {
    
    public static function converterFormEmArray($form) {
        $formulario = array();
        var_dump($form);
        foreach ($form as $key => $value) {
            if(strpos($value['name'], '[]')) {
                $formulario[$value['name']][] = $value['value'];
            } else $formulario[$value['name']] = trim($value['value']);
        }
        return $formulario;
    }

    public static function validarCampo($tipo, $valor, $mensagemErro = '') {

        if($tipo=="integer") {        
            if(!is_numeric($valor)) throw new Exception($mensagemErro == '' ? "Não é um valor válido." : $mensagemErro, 999);
            if(empty($valor)) throw new Exception($mensagemErro == '' ? "Informe o código do Sprint." : $mensagemErro, 998);
            if($valor <= 0) throw new Exception($mensagemErro == '' ? "Sprint inválido." : $mensagemErro, 998);
            return ['status'=>true];       
        } else if ($tipo == "string") {
            if(empty(trim($valor))) throw new Exception($mensagemErro == '' ? 'Campo vazio' : $mensagemErro, 997);
            if(is_null($valor)) throw new Exception($mensagemErro == '' ? 'Campo não pode ser nulo.' : $mensagemErro, 997);
            return ['status' => true]; 
        } else if ($tipo == "time") {
            if(empty(trim($valor))) throw new Exception($mensagemErro == '' ? 'Campo vazio' : $mensagemErro, 996);
            if(is_null($valor)) throw new Exception($mensagemErro == '' ? 'Campo não pode ser nulo.' : $mensagemErro, 996);
            return ['status' => true];
        }

    }

    public static function converterStringParaHora($valor, $padrao = 'H:i:s', $padraoSaida = 'H:i:s') {
        return DateTime::createFromFormat($padrao, $valor)->format($padraoSaida);
    }
}