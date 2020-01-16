$(document).ready(function () {
    $('#sprint').DataTable();
    __onFindSprint();
    let data = __onFindTarefas();
});

function __onFindSprint() {

    $.ajax({
        type: "POST",
        url: "./factory/SprintFactory.php",
        data: "buscarSprint",
        dataType: 'text',
        success: function (data) {
            $('#tabela').append(data);
        }
    });

}

function __onFindTarefas() {

    $.post("./factory/TarefaFactory.php", {"buscarTarefas": 1}, function (data) {
        let dados = [];
        let size = data.length;        
        $(data).each(function( index, element){
            dados.push({y: (size - index)});
        });

        let tarefas = [];
          
        __onGrafico(dados, tarefas, data[1]['spt_nome']);
    }, "json");
}

function __onGrafico(data, tarefas, nomeGrafico) {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {text: nomeGrafico},
        axisY: {
            includeZero: false
        },
        data: [{
            type: "line",
            dataPoints: data
        }]
    });
    chart.render();

}