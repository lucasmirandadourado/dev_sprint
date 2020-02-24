<?php
require_once('../template/Pagina.php');
$pagina = new Pagina();
$pagina->addCSS('../asset/css/cadastrar_sprint.css');
$pagina->head("Cadastrar Sprint");
?>

<div id="ds_conteudo">

  <h1 class="sp_titulo">Criar Sprint</h1>
  <hr class="sp_divisao" />
  <button class="btn btn-primary" id="addSprint">Add Sprint</button>
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

<div class="modal" id="modalCadastrarSprint" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Sprint</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="cadastrar_mensagem"></div>
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

          <div id="add_dia">
            <input type="date" class="form-control" name="data" id="data">
            <a href="" id="addDia" class="btn btn-primary">Add dia</a>
          </div>

          <div class="datas-dias">

            <table id="add_dias_sprint" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Dia</th>
                  <th></th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <a href="" id="spt-salvar-sprint" class="btn btn-primary">Salvar</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modalEditarSprint" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Sprint</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="cadastrar_mensagem"></div>
        <form id="formEditar" method="POST">
          <input type="hidden" name="sptId" id="sptId">

          <div class="row sp-cadastro-sprint">
            <div class="col form-group col-md-8">
              <label for="edt_nome">Nome do sprint</label>
              <input type="text" class="form-control" id="edt_nome" name="edt_nome" placeholder="Nome do Sprint">
            </div>

            <div class="col form-group col-md-4">
              <label for="edt_qtdDevs">Quant. de Devs</label>
              <input type="number" class="form-control" id="edt_qtdDevs" name="edt_qtdDevs" placeholder="Quantidade de Desenvolvedores">
            </div>

            <div class="col form-group  col-md-4">
              <label for="edt_qtdDiasSprint">Quant. de dias do Sprint</label>
              <input type="number" class="form-control" min="1" max="30" id="edt_qtdDiasSprint" name="edt_qtdDiasSprint" placeholder="Quantidade dias">
            </div>
          </div>

          <div class="datas-dias">
            <table id="dias_sprint" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Dia</th>
                  <th></th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <a href="" id="spt-salvar-sprint" class="btn btn-primary">Salvar</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" id="modalDeletarSprint" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deletar Sprint</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="idSprint" id="idSprint">
        <p>Têm certeza que deseja deletar essa Sprint?</p>
      </div>
      <div class="modal-footer">
        <a href="" id="deletar-sprint" class="btn btn-primary">Sim</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
      </div>
    </div>
  </div>
</div>

<?php
$pagina->addJS('../asset/js/cadastrarSprint.js');
$pagina->footer();
?>