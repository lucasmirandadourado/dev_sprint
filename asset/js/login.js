
$('button').click(function (e) {
    e.preventDefault();
    let login = document.getElementById("login").value;
    let senha = document.getElementById("senha").value;

    let data = { "login": login, "senha": senha }

    $.post('./controller/LoginController.php', data, function (data, status) {
        if (data) {
            console.log(data);
            window.location.href = './view/index.php';
        } else {
            $('#mensagem').html('Senha errada');
        }
    }, "json");

});