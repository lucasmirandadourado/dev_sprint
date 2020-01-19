<?php
require_once('./template/header.php');
?>

<link rel="stylesheet" href="asset/sprint.css">
<div>
  <div id="menu">
    <a href="/dev_sprint"><img src="./asset/img/scrum-head.png" class="logo" alt="Dev Sprint"></a>
    <div id="menu-itens">
      <a href="#" id="tarefas">TAREFAS</a>
      <a href="./cadastrar-sprint.php" id="sprints">SPRINT</a>
      <!-- <a href="#">SAIR</a> -->
    </div>
  </div>
  <div id="conteudo">
    <form id="formCadastrar">
      <div class="row">

        <div class="col form-group">
          <label for="nome">Nome do sprint</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Sprint">
        </div>

        <div class="col form-group">
          <label for="qtdDiasSprint">Quantidade de dias do Sprint</label>
          <input type="number" class="form-control" id="qtdDiasSprint" name="qtdDiasSprint" placeholder="Quantidade dias">
        </div>

        <div class="col form-group">
          <label for="qtdDevs">Quantidade de Desenvolvedores</label>
          <input type="number" class="form-control" id="qtdDevs" name="qtdDevs" placeholder="Quantidade de Desenvolvedores">
        </div>

      </div>
      <div id="dias">

      </div>
      <button type="submit" id="salvar-sprint" class="btn btn-primary">Salvar</button>
    </form>
  </div>

</div>
<div id="footer">
  <div id="desenvolvedor">Desenvolvedor: Lucas Dourado</div>
  <img src="./asset/img/scrum-head.png" class="logo-footer" alt="Dev Sprint">
</div>

<script src="./asset/chartjs/canvasjs.min.js"></script>
<script src="./asset/js/jquery-3.3.1.min.js"></script>
<script src="./asset/js/jquery.dataTables.min.js"></script>
<script src="./asset/js/dataTables.bootstrap4.min.js"></script>
<script src="./asset/js/cadastrarSprint.js"></script>
<?php
require_once('./template/footer.php');
?>