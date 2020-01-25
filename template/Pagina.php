<?php
class Pagina {

    private $js = array();
    private $css = array();

    public function __construct() {
        require_once('sessao.php');
        array_push($this->js, '../asset/chartjs/canvasjs.min.js');
        array_push($this->js, '../asset/js/jquery-3.3.1.min.js');
        array_push($this->js, '../asset/js/jquery.dataTables.min.js');
        array_push($this->js, '../asset/js/dataTables.bootstrap4.min.js');
    
        array_push($this->css, '../asset/css/bootstrap.min.css');     
    }

    public function head($nomeSprint = "") {       
        
        echo "<!DOCTYPE html>
            <html lang='pt-br'>        
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <meta http-equiv='X-UA-Compatible' content='ie=edge'>
                <title>Dev Sprint - $nomeSprint</title>
                
                <link rel='shortcut icon' type='image/x-icon' href='../asset/img/icon.ico'/>
                ";
        
            foreach ($this->css as $value) {
                echo '<link rel="stylesheet" href='.$value.'>';            
            }
        
        echo '</head><body>
        
        <div>
        <div id="menu">
            <a href="./"><img src="../asset/img/scrum-head.png" class="logo" alt="Dev Sprint"></a>
            <div id="menu-itens">
            <a href="#" id="tarefas">TAREFAS</a>
            <a href="./view/cadastrar-sprint.php" id="sprints">SPRINT</a>
            <a href="#" id="sair">SAIR</a>
            </div>
        </div>
        ';
    }

    public function addJS($js) {
        array_push($this->js, $js);
    }

    public function addCSS($css) {
        array_push($this->css, $css);
    }
    
    public function footer(){
        foreach ($this->js as $value) {
            echo "<script src=".$value."></script>";
        }        
        echo "</body>        
        </html>";
    }
}