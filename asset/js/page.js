$(document).on('click', '#sair', function(e) {
    console.log('OI');
    $.post('../controller/LoginController.php', 'sair', function(data){
        if(data) document.location.reload(true);
    });
});