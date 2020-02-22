<?php

function cabecalho($nomeSprint, $css)
{
    echo "<!DOCTYPE html>
            <html lang='pt-br'>        
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <meta http-equiv='X-UA-Compatible' content='ie=edge'>
                <title>$nomeSprint</title>
                
                <link rel='shortcut icon' type='image/x-icon' href='../asset/img/icon.ico'/>";

    foreach ($css as $value) {
        echo '<link rel="stylesheet" href=' . $value . '>';
    }
}
