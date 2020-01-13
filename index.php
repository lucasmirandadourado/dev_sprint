<?php
require_once('./template/header.php');
?>

<link rel="stylesheet" href="isset/login.css">
<div class="container sprint">
    <table class="table table-striped table-bordered" id="sprint">
        <thead>
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>Qtd Colaborador</td>
                <td>Data início</td>
            </tr>
        </thead>
        <tbody id="tabela">
            
        </tbody>
    </table>
</div>

<script src="./isset/js/jquery-3.3.1.min.js"></script>
<script src="./isset/js/jquery.dataTables.min.js"></script>
<script src="./isset/js/dataTables.bootstrap4.min.js"></script>
<script src="./isset/js/buscarColaboradores.js"></script>


<?php
require_once('./template/footer.php');
?>
