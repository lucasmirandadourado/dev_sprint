<?php
require_once('./template/header.php');
?>

<link rel="stylesheet" href="asset/login.css">

<div class="container sprint">
    <div id="sprints_cadastrados">
        
    </div>
    <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>

    <table class="table table-striped table-bordered" id="sprint">
        <thead>
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>Qtd Colaborador</td>
                <td>Data início</td>
            </tr>
        </thead>
        <tbody id="tabela"></tbody>
    </table>

</div>



<script src="./asset/chartjs/canvasjs.min.js"></script>
<script src="./asset/js/jquery-3.3.1.min.js"></script>
<script src="./asset/js/jquery.dataTables.min.js"></script>
<script src="./asset/js/dataTables.bootstrap4.min.js"></script>
<script src="./asset/js/buscarColaboradores.js"></script>


<?php
require_once('./template/footer.php');
?>