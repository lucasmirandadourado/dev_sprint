<?php
require_once('../template/Pagina.php');
$pagina = new Pagina();
$pagina->addCSS('../asset/css/cadastrar_sprint.css');
$pagina->head("Cadastrar Sprint");
?>

<div id="ds_conteudo">

  <h1 class="sp_titulo">Criar Sprint</h1>
  <hr class="sp_divisao" />

  <form id="formCadastrar" method="POST">
    <div class="row sp-cadastro-sprint">

      <div class="col form-group col-md-8">
        <label for="nome">Nome do sprint</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Sprint">
      </div>

      <div class="col form-group col-md-4">
        <label for="qtdDevs">Quant. de Devs</label>
        <input type="number" class="form-control" id="qtdDevs" name="qtdDevs" placeholder="Quantidade de Desenvolvedores">
      </div>

      <div class="col form-group  col-md-4">
        <label for="qtdDiasSprint">Quant. de dias do Sprint</label>
        <input type="number" class="form-control" min="1" max="30" id="qtdDiasSprint" name="qtdDiasSprint" placeholder="Quantidade dias">
      </div>
    </div>

    <div class="datas-dias">

    </div>

    <div id="salvar-sprint">
      <button class="btn btn-success" id="sp-salvar-sprint" type="submit">Salvar</button>
    </div>
  </form>

  <br>

  <table id="tabela-sprint" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Data Criação</th>
        <th scope="col">Quant. Programador</th>
        <th scope="col">Quant. horas</th>
        <th scope="col">Quant. Tarefas</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>

    <tbody></tbody>
  </table>
</div>

<br>

<div class="modal" id="modalEditarColaborador" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Colaborador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="cadastrar_mensagem"></div>
        <form id="cadastrarColaborador" method="POST">

          <div class="form-group">
            <label for="id">Código</label>
            <input type="number" class="form-control" name="edt_col_id" id="edt_col_id" disabled>
          </div>

          <div class="form-group">
            <label for="edt_nome">Nome</label>
            <input type="text" name="edt_nome" id="edt_nome" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label for="edt_qtd_dev">Quantidade de colaborador</label>
            <input type="text" name="edt_qtd_dev" id="edt_qtd_dev" class="form-control" required>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <a href="" id="spt-salvar-colaborador" class="btn btn-primary">Salvar</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
      </div>
    </div>
  </div>
</div>


<?php
$pagina->addJS('../asset/js/cadastrarSprint.js');
$pagina->footer();
?>