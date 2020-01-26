$(document).ready(function(e){


    $('#exampleModal').on('shown.bs.modal', function () {
        $('#exampleModal').medal('show')
    })

    $('#tarefas-tabela').DataTable();

    $(document).on('change', '#qtdDiasSprint', function(e){
        let dias = $('#qtdDiasSprint').val();
        adicionarDias(dias);
    });

    $(document).on('click', '#salvar-sprint', function(e){
        e.preventDefault();
        
        var t = $('#tarefas-tabela').DataTable();
        let tarefas = t.data();
        let array = new Array();
        $(tarefas).each(function (index, element) {
            if(element != null) {
                array.push(Array(element[0], element[1], element[2], element[3]));
            }
        });

        let nome = $('#nome').val();
        let dias = $('#qtdDiasSprint').val();
        let qtdDev = $('#qtdDevs').val();
        let data = {
            "salvarSprint": true,
            "sprint": {
                "nome": nome,
                "dias": dias,
                "qtdDev": qtdDev
            },
            "tarefas": array
        }

        $.ajax({
            url: '../controller/sprintController.php',
            method: "POST",
            data: data,
            dataType: 'json',
            success: function(result) {
                console.log(result)
            }
        });
    });

    $(document).on('click', '#addTarefaTabela', function(e){
        e.preventDefault();
        let codigo = $('#codigo').val();
        let titulo = $('#titulo').val();
        let descricao = $('#descricao').val();
        let tempoEstimativa = $('#tempoEstimativa').val();
        
        var t = $('#tarefas-tabela').DataTable();
        t.row.add( [
            codigo,
            titulo,
            descricao,
            tempoEstimativa,
            `<a href='#'><img id='excluir' data-id='${codigo}' src='../asset/icon/close-24px.svg'></a>`
        ] ).draw( false );
          
    });
});

function adicionarDias(quantidade) {
    for (let i = 1; i <= quantidade; i++) {
        let input = `<div class="form-group">
                        <label for="dia_${i}">Dia ${i}</label>
                        <input type="date" class="form-control" name="dia_${i}" id="dia_${i}">
                    </div>`;
        $('#dias').append(input);
    }
}