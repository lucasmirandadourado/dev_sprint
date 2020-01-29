<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dev Sprint - Login</title>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css/login.css">
</head>

<body>
    <section class="container alinhamento-central">
        <form class="item" method="POST">
            <div id="mensagem"></div>
            <div class="row" id="logo">
                <img id="imagem" src="./asset/img/scrum-head.png" alt="Scrum">
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" id="login" name="login">
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                </div>
            </div>
            <div class="row logo-btn">
                <button class="btn btn-success">Entrar</button>
            </div>
        </form>
    </section>

    <script src="./asset/js/jquery-3.3.1.min.js"></script>
    <script src="./asset/js/login.js"></script>
</body>
</html>