class Tarefa {

    constructor(){
        
    }

    getTarefas(id) {
        $.ajax({
            url: '../controller/TarefasController.php',
            method: "GET",
            dataType: 'json',
            data: {sprint: id},
            success: function (result) {
                
                $('#nome-sprint').text(result.name);
                $('#colaborador-sprint').text(result.qth_colaboradores);
                $('#dias-sprint').text(result.data_inicio);

                let row = '';
                if(result.tarefas.length > 0) {
                    result.tarefas.forEach(element => {
                        row += `<tr>
                            <td>${element.codigo}</td>
                            <td>${element.titulo}</td>
                            <td>${element.descricao}</td>
                            <td>${element.hora_estimada == undefined ? '' : element.hora_estimada}</td>
                        </tr>`;
                    });
                }
                $('#tarefas-tabela-row').html(row);
        
            }
        });
    }

    salvarTarefa(tarefa, id_sprint) {
        let dados = {
            "salvarTarefa": id_sprint,
            tarefa
        }

        $.ajax({
            url: '../controller/TarefasController.php',
            method: "POST",
            dataType: 'json',
            data: dados,
            success: function (result) {
                console.log(result);
                alert("OK");
        
            }
        });
    }

}

let tar = new Tarefa();
let id_sprint = $('#sprint_id').val();
tar.getTarefas(id_sprint);

$(document).on('click', '#salvar-sprint', function(e){
    e.preventhefault();
    let tarefa = $('#tarefas-form').serializeArray();
    let id_sprint = $('#sprint_id').val();
    tar.salvarTarefa(tarefa, id_sprint);
})