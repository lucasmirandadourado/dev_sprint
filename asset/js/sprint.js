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
            let select = $('#select-sprint').select2({
                placeholder: 'Selecione o sprint',
                width: '100vh',
                data: data
            });

        }, "json");
    }

    buscarDadosSprint(id) {
        $.get('../controller/SprintController.php', { "buscarSprint": id }, function (result) {
            
            let arrayTareas = result.tarefas;
            $.each(arrayTareas, function (i, e) {
                let hora_estimada = moment(e.hora_estimada, 'HH:mm:ss').format('HH:mm');
                let horas_lancadas = (e.horas_lancadas != null ? ` - ${moment(e.horas_lancadas, 'HH:mm:ss').format('HH:mm')}` : '');
                
                let task = `<div class="task">
                    <div class="task_head">
                        <span>ID: ${e.codigo}</span>
                        <span class="task_horas_estimada">
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
}

let sprint = new Sprint();

$(document).ready(function () {
    sprint.buscarSprint();

    $(document).on('select2:select', function (e) {
        e.preventDefault();
        var data = e.params.data.id;
        sprint.buscarDadosSprint(data);
    })
});