<?php
require_once('./template/header.php');
?>

<style>
     .container {
        max-width: 420px;
        margin: 0 auto;
        display: flex;
        border: 1px solid #ccc;
     }

    .alinhamento-central {
    	height: 400px;
        justify-content: center;
        align-items: center;
    }

    .alinhamento-central .item {
        flex: 0;        
    }
    .item {
        text-align: left;
        font-size: 1.5em;
    }
</style>

<section class="container alinhamento-central">
    <form class="item">
        <div  class="row">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="login">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password">
            </div>
        </div>
        <div class="row">
            <button class="btn btn-success">Entrar</button>
        </div>
    </form>
</section>


<script src="./asset/chartjs/canvasjs.min.js"></script>
<script src="./asset/js/jquery-3.3.1.min.js"></script>
<script src="./asset/js/jquery.dataTables.min.js"></script>
<script src="./asset/js/dataTables.bootstrap4.min.js"></script>

<?php
require_once('./template/footer.php');
?>