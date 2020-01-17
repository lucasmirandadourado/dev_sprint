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

    // var chart = new CanvasJS.Chart("chartContainer", {
    //     animationEnabled: true,
    //     theme: "light2",
    //     title: {text: nomeGrafico},
    //     axisY: {
    //         includeZero: false
    //     },
    //     data: [{
    //         type: "line",
    //         dataPoints: data
    //     }]
    // });


    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Dias"
        },
        axisX:{
            valueFormatString: "DD MMM",
            crosshair: {
                enabled: true,
                snapToDataPoint: true
            }
        },
        axisY: {
            title: "Tarefas concluídas",
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
            color: "#F08080",
            dataPoints: [
                { x: new Date(2020, 0, 3), y: 10 },
                { x: new Date(2020, 0, 4), y: 10 },
                { x: new Date(2020, 0, 5), y: 9 },
                { x: new Date(2020, 0, 6), y: 7 },
                { x: new Date(2020, 0, 7), y: 6 },
                { x: new Date(2020, 0, 8), y: 6 },
                { x: new Date(2020, 0, 9), y: 5 },
                { x: new Date(2020, 0, 10), y: 5 },
                { x: new Date(2020, 0, 11), y: 3 },
                { x: new Date(2020, 0, 12), y: 2 },
                { x: new Date(2020, 0, 13), y: 0 }
            ]
        },
        {
            type: "line",
            showInLegend: false,
            name: "Dias",
            lineDashType: "dash",
            dataPoints: [
                { x: new Date(2020, 0, 3), y: 10 },
                { x: new Date(2020, 0, 4), y: 9 },
                { x: new Date(2020, 0, 5), y: 8 },
                { x: new Date(2020, 0, 6), y: 7 },
                { x: new Date(2020, 0, 7), y: 6 },
                { x: new Date(2020, 0, 8), y: 5 },
                { x: new Date(2020, 0, 9), y: 4 },
                { x: new Date(2020, 0, 10), y: 3 },
                { x: new Date(2020, 0, 11), y: 2 },
                { x: new Date(2020, 0, 12), y: 1 },
                { x: new Date(2020, 0, 13), y: 0 }
            ]
        }]
    });
    chart.render();

}

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}