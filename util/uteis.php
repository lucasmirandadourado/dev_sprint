<?php

function converterFormEmArray($form) {
    $formulario = array();
    foreach ($form as $key => $value) {
        $formulario[$value['name']] = trim($value['value']);
    }
    return $formulario;
}