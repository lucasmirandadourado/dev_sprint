$(document).on('click', '#sair', function(e) {
    console.log('OI');
    $.post('../controller/loginController.php', 'sair', function(data){
        if(data) document.location.reload(true);
    });
});