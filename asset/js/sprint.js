$(document).ready(function () {
    $('#sprint').DataTable();
    __onFindSprint();
    let tarefas = [];
          let data =  [
            { x: new Date(2020, 0, 3), y: 35 },
            { x: new Date(2020, 0, 4), y: 32 },
            { x: new Date(2020, 0, 5), y: 28 },
            { x: new Date(2020, 0, 6), y: 25 },
            { x: new Date(2020, 0, 7), y: 21 },
            { x: new Date(2020, 0, 8), y: 18 },
            { x: new Date(2020, 0, 9), y: 14 },
            { x: new Date(2020, 0, 10), y: 11 },
            { x: new Date(2020, 0, 11), y: 7 },
            { x: new Date(2020, 0, 12), y: 4 },
            { x: new Date(2020, 0, 13), y: 0 }
        ];
    __onGrafico(data, tarefas, "Teste");
    // let data = __onFindTarefas();

    $(document).on('change', '#selecionar-sprints', function(e){
        let id = $(this).find(':selected').data('id')
        $.ajax({
            type: "POST",
            url: "./controller/SprintController.php",
            data: {"info_sprint" : id},
            dataType: 'json',
            success: function (data) {          
                $('#horas_trabalhadas').html();
                let qtd_tarefa = data.tarefas.length;
                $('#qtd_tarefa').html(qtd_tarefa);
                $('#bugs').html(0);
                let dias = [
                    new Date(2020, 0, 3),
                    new Date(2020, 0, 4),
                    new Date(2020, 0, 5),
                    new Date(2020, 0, 6),
                    new Date(2020, 0, 7),
                    new Date(2020, 0, 8),
                    new Date(2020, 0, 9),
                    new Date(2020, 0, 10),
                    new Date(2020, 0, 11),
                    new Date(2020, 0, 12)
                ];
                let dados = dadosGraficoLinha(data.tarefas.length, 10, dias);               
                
                let tarefas = [];
                let media = Math.round(qtd_tarefa/10);

                for (let index = 0; index < 5; index++) {
                    let tar = qtd_tarefa - Math.round(media*index);
                    tarefas.push({x: new Date(2020, 0, 3+index), y: tar});       
                }

                dadosTarefasEntregues(data.tarefas, 10);
                __onGrafico(dados, tarefas, data.name);
            }
        });
    });
});

function dadosTarefasEntregues(tarefas, dias) {
    let tarefasConcluidas = tarefas.filter(tar => {
        if(tar.tar_data_finalizada != null) return true;
    });

    let qtdTarefasConcluidas = tarefasConcluidas.length;
    console.log(qtdTarefasConcluidas)
}

function dadosGraficoLinha(qtdTarefas, qtdDias, dias) {
    let dados = [];
    let media = Math.round(qtdTarefas/qtdDias);
    
    for (let i = 0; i < qtdDias; i++) {
        let tar = qtdTarefas -  Math.round(media*i);
        dados.push({x: dias[i], y: tar});       
    }
    return dados;
}

function horasLancadas(tarefas) {
    
}

function __onFindSprint() {

    $.ajax({
        type: "POST",
        url: "./controller/SprintController.php",
        data: "buscarSprint",
        dataType: 'text',
        success: function (data) {          
            $('#selecionar-sprints').html(data)
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
    $('.canvasjs-chart-container').remove();
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Sprint 39"
        },
        axisX:{
            valueFormatString: "DD MMM",
            crosshair: {
                enabled: true,
                snapToDataPoint: true
            }
        },
        axisY: {
            title: "Tarefas",
            crosshair: {
                enabled: true
            }
        },
        toolTip:{
            shared:true
        },  
        legend:{
            cursor:"pointer",
            verticalAlign: "bottom",
            horizontalAlign: "left",
            dockInsidePlotArea: true,
            itemclick: toogleDataSeries
        },
        data: [{
            type: "line",
            showInLegend: true,
            name: "Tarefas",
            markerType: "square",
            xValueFormatString: "DD MMM, YYYY",
            color: "#f25e5e",
            dataPoints: tarefas
        },
        {
            type: "line",
            showInLegend: false,
            name: "Dias",
            lineDashType: "dash",
            dataPoints: data
        }]
    });
    chart.render();
    $('.canvasjs-chart-credit').remove();
}

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
