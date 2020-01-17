<?php
require_once('./template/header.php');
?>

<link rel="stylesheet" href="asset/sprint.css">

<div id="menu">
    <img src="./asset/img/scrum-head.png" class="logo" alt="Dev Sprint">
    <div id="menu-itens">
        <a href="#" id="tarefas">TAREFAS</a>
        <a href="#" id="sprints">SPRINT</a>
        <!-- <a href="#">SAIR</a> -->
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

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Criar Sprint</button>


    </div>
    <div id="grafico">
    <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
    </div>
</div>
<div id="footer">
    <div id="desenvolvedor">Desenvolvedor: Lucas Dourado</div>
    <img src="./asset/img/scrum-head.png" class="logo-footer" alt="Dev Sprint">
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>




<script src="./asset/chartjs/canvasjs.min.js"></script>
<script src="./asset/js/jquery-3.3.1.min.js"></script>
<script src="./asset/js/jquery.dataTables.min.js"></script>
<script src="./asset/js/dataTables.bootstrap4.min.js"></script>
<script src="./asset/js/buscarColaboradores.js"></script>
<?php
require_once('./template/footer.php');
?>