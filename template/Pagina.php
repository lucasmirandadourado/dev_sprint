<?php
session_start();
class Pagina {

    private $js = array();
    private $css = array();

    public function __construct() {
        require_once('sessao.php');
        array_push($this->js, '../asset/chartjs/canvasjs.min.js');
        array_push($this->js, '../asset/js/moment.min.js');
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
        require_once(dirname(__FILE__).'/../template/header.php');    
        cabecalho($nomeSprint, $this->css);
        require_once(dirname(__FILE__).'/../template/menu.php');
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
        require_once(dirname(__FILE__).'/../template/footer.php');
    }
}