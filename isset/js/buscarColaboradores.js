$(document).ready(function () {
    __onFindSprint();

    $('#sprint').DataTable();
});

function __onFindSprint() { 

    $.ajax({
        type: "POST",
        url: "./factory/SprintFactory.php",
        data: "buscarSprint",
        dataType: 'text',
        success: function (data) {
            console.log(data);
            $('#tabela').append(data);
        }
    });

}