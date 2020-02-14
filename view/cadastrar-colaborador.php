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
    <div id="addColaborador">
        <a class="btn" id="btn-addColaborador">Cadastrar Colaborador</a>
    </div>

    <hr />
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

    <br>

    <div class="modal" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
$pagina->addJS('../asset/js/cadastrarColaborador.js');
$pagina->footer();
?>