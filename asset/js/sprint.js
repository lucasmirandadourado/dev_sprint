class Sprint {
    buscarSprint() {
        $.get("../controller/SprintController.php", "buscarListaSprint", function (result) {

            let data = Array();
            result.forEach(element => {
                data.push({
                    id: element.spt_id,
                    text: element.spt_nome
                });
            });
            $('#select-sprint').select2({
                placeholder: 'Selecione o sprint',
                width: '100vh',
                data: data
            });

        }, "json");
    }

    buscarDadosSprint(id) {
        $.get('../controller/SprintController.php', { "buscarSprint": id }, function (result) {
            $('#add_tarefas_to_do').html('');
            $('#add_tarefas_in_progress').html('');
            $('#add_tarefas_done').html('');
            let arrayTareas = result.tarefas;
            $.each(arrayTareas, function (i, e) {
                let hora_estimada = moment(e.hora_estimada, 'HH:mm:ss').format('HH:mm');
                let horas_lancadas = (e.horas_lancadas != null ? ` - ${moment(e.horas_lancadas, 'HH:mm:ss').format('HH:mm')}` : '');
                
                let task = `<div class="task" data-task="${e.id}">
                    <div class="task_head">
                        <span>ID: ${e.codigo}</span>                        
                        <span class="task_horas_estimada">
                            ${e.bug ? `<img class="bug" src="../asset/icon/icons8-inseto-1002.png" alt="bug">` : ''}
                            <img src="../asset/icon/icons8-time-24.png" alt=""> ${hora_estimada} ${horas_lancadas}
                        </span>
                    </div>
                    <div class="task_titulo">${e.titulo}</div>
                </div>`;

                if (e.data_iniciada == null) {
                    $('#add_tarefas_to_do').append(task);
                
                }
                if (e.data_iniciada != null && e.data_finalizacao == null) {
                    $('#add_tarefas_in_progress').append(task);
                }
                if (e.data_iniciada != null && e.data_finalizacao != null) {
                    $('#add_tarefas_done').append(task);
                }                
            });


        }, 'json');
    }

    getDetalhesTarefa(id) {
        $.post('../controller/TarefasController.php', {"buscarTarefa": id}, function(result){
            console.log(result);
            $('#modalDetalhesTarefa').modal('show');
            $('#idTarefa').val(result.id);
            $('#codigo').val(result.codigo);
            $('#titulo').val(result.titulo);
            $('#descricao').val(result.descricao);
            $('#colaborador').val(result.colaborador);
            $('#bug').val(result.bug);
            $('#tarefa_bug').val(result.tarefa_bug);
            $('#data_iniciada').val(result.data_iniciada);
        }, 'json');
    }
}

let sprint = new Sprint();

$(document).ready(function () {

    sprint.buscarSprint();

    $(document).on('select2:select', function (e) {
        e.preventDefault();
        var data = e.params.data.id;
        sprint.buscarDadosSprint(data);
    });

    $(document).on('click', '.task', function(e) {
        e.preventDefault();
        let id = $(this).data('task');
        sprint.getDetalhesTarefa(id);
    });
});