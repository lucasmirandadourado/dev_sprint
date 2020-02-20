<?php
session_start();
class Pagina {

    private $js = array();
    private $css = array();

    public function __construct() {
        require_once('sessao.php');
        // array_push($this->js, '../asset/chartjs/canvasjs.min.js');
        // array_push($this->js, '../asset/js/moment.min.js');
        array_push($this->js, '../asset/js/jquery-3.3.1.min.js');
        array_push($this->js, '../asset/js/bootstrap.min.js');
        array_push($this->js, '../asset/js/jquery.dataTables.min.js');
        array_push($this->js, '../asset/js/dataTables.bootstrap4.min.js');
        array_push($this->js, '../asset/js/select2.min.js');
        array_push($this->js, '../asset/js/page.js');

        
        array_push($this->css, '../asset/css/bootstrap.min.css');     
        array_push($this->css, '../asset/css/select2.min.css');     
        array_push($this->css, '../asset/css/sprint.css');     
        
    }

    public function head($nomeSprint = "") {       
        
        echo "<!DOCTYPE html>
            <html lang='pt-br'>        
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <meta http-equiv='X-UA-Compatible' content='ie=edge'>
                <title>$nomeSprint</title>
                
                <link rel='shortcut icon' type='image/x-icon' href='../asset/img/icon.ico'/>";
        
            foreach ($this->css as $value) {
                echo '<link rel="stylesheet" href='.$value.'>';            
            }
            
        echo '</head><body>
        
        <div class="sp-container">
        <div id="menu">
            <a href="./"><img src="../asset/img/scrum-head.png" class="logo" alt="Dev Sprint"></a>
            <div id="menu-itens">
                <a href="../view/cadastrar-colaborador.php" id="colaborador">COLABORADOR</a>
                <a href="../view/cadastrar-sprint.php" id="sprints">SPRINT</a>
                <a href="#" id="tarefas">TAREFAS</a>
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
        echo "
        
        <div id='footer'>
            <div id='desenvolvedor'>Desenvolvedor: Lucas Dourado</div>
            <img src='../asset/img/scrum-head.png' class='logo-footer' alt='Dev Sprint'>
        </div>

        </body>        
        </html>";
    }
}