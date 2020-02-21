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