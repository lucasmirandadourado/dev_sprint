<?php
require_once('./template/header.php');
?>

<link rel="stylesheet" href="asset/sprint.css">

<div id="menu">
    <img src="./asset/img/sprint.png" class="logo" alt="Dev Sprint">
    <div id="menu-itens">
        <a href="#">TAREFAS</a>
        <a href="#">SPRINT</a>
        <a href="#">SAIR</a>
    </div>
</div>
<div id="conteudo">
    <div id="selecionarSprint">
        <select name="selecionar-sprints" id="selecionar-sprints"></select>
        <div id="info">
            <table class="table">
                
                <tbody>
                    <tr>
                        <td>Horas trabalhadas</td>
                        <td>40</td>
                    </tr>
                    <tr>
                        <td>Quantidade de tarefas</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>Bugs</td>
                        <td>2</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div id="grafico">
    <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
    </div>
</div>
<div id="footer">
    <div id="desenvolvedor">Desenvolvedor: Lucas Dourado</div>
    <img src="./asset/img/sprint.png" class="logo-footer" alt="Dev Sprint">
</div>

<script src="./asset/chartjs/canvasjs.min.js"></script>
<script src="./asset/js/jquery-3.3.1.min.js"></script>
<script src="./asset/js/jquery.dataTables.min.js"></script>
<script src="./asset/js/dataTables.bootstrap4.min.js"></script>
<script src="./asset/js/buscarColaboradores.js"></script>
<?php
require_once('./template/footer.php');
?>