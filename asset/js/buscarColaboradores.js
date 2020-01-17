$(document).ready(function () {
    $('#sprint').DataTable();
    // __onFindSprint();
    let tarefas = [];
          
    __onGrafico(null, tarefas, "Teste");
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
            dataPoints: [
                { x: new Date(2020, 0, 3), y: 35 },
                { x: new Date(2020, 0, 4), y: 35 },
                { x: new Date(2020, 0, 5), y: 32 },
                { x: new Date(2020, 0, 6), y: 30 },
                { x: new Date(2020, 0, 7), y: 24 },
                { x: new Date(2020, 0, 8), y: 24 },
                { x: new Date(2020, 0, 9), y: 21 },
                { x: new Date(2020, 0, 10), y: 18 },
                { x: new Date(2020, 0, 11), y: 9 },
                { x: new Date(2020, 0, 12), y: 5 },
                { x: new Date(2020, 0, 13), y: 1 }
            ]
        },
        {
            type: "line",
            showInLegend: false,
            name: "Dias",
            lineDashType: "dash",
            dataPoints: [
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
            ]
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

$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })