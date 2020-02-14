<?php
require_once('../template/Pagina.php');
$pagina = new Pagina();
$pagina->addCSS('../asset/css/cadastrar_colaborador.css');
$pagina->addCSS('../asset/css/dataTables.bootstrap4.min.css');
$pagina->head("Cadastrar Colaborador");
?>


<div id="ds_conteudo">

    <h1 class="sp_titulo">Colaborador</h1>
    <hr class="sp_divisao" />

    <table id="tabela-colaboradores" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cargo</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody></tbody>
    </table>

</div>

<br>

<?php
$pagina->addJS('../asset/js/cadastrarColaborador.js');
$pagina->footer();
?>