
$('button').click(function (e) {
    e.preventDefault();
    let login = document.getElementById("login").value;
    let senha = document.getElementById("senha").value;

    let data = { "login": login, "senha": senha }

    $.post('./controller/loginController.php', data, function (data, status) {
        if (data) {
            window.location.href = 'index.php';
        } else {
            $('#mensagem').html('Senha errada');
        }
    }, "json");

});