class Tarefa {

    getTarefas(id) {
        $.ajax({
            url: '../controller/TarefasController.php',
            method: "GET",
            dataType: 'json',
            data: { sprint: id },
            success: function (result) {
                let tarefas = result.tarefas;
                let colaboradores = result.colaboradores;

                $('#nome-sprint').text(tarefas.name);
                $('#colaborador-sprint').text(tarefas.qtd_colaboradores);
                $('#dias-sprint').text(tarefas.data_inicio);

                let row = '';
                if (tarefas.tarefas.length > 0) {
                    tarefas.tarefas.forEach(element => {
                        row += `<tr data-tarefa="${element.id}">
                            <td>${element.codigo}</td>
                            <td>${element.titulo}</td>
                            <td>${element.descricao}</td>
                            <td>${moment(element.hora_estimada, 'hh:mm:ss').format('hh:mm')}</td>
                        </tr>`;
                    });
                }
                let data = [];
                $(colaboradores).each((index, element) => {
                    data.push({
                        id: element.id,
                        text: element.nome
                    });
                });

                $('#colaborador').select2({
                    placeholder: 'Selecione o colaborador',
                    data: data
                });
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

                moment.locale('pt-br');
                console.log(moment(tarefa.hora_estimada).format('h:mm:ss'));

                $('#tarefas-tabela-row').append(`<tr>
                    <td>${tarefa.codigo}</td>
                    <td>${tarefa.titulo}</td>
                    <td>${tarefa.descricao}</td>
                    <td>${tarefa.hora_estimada}</td>
                </tr>`);

            }
        });
    }

    apresentarForm(id) {
        $.ajax({
            url: '../controller/TarefasController.php',
            method: "POST",
            dataType: 'json',
            data: { buscarTarefa: id },
            success: function (result) {
                $('#codigo').val(result.codigo);
                $('#tempoEstimativa').val(moment(result.hora_estimada, 'HH:mm').format('hh:mm'));
                $('#titulo').val(result.titulo);
                $('#descricao').val(result.descricao);
                $('#id').val(result.id);
                
                $('#colaborador').val(result.colaborador);
                $('#colaborador').trigger('change'); 
            }
        });
    }
}

let tar = new Tarefa();
let id_sprint = $('#sprint_id').val();
tar.getTarefas(id_sprint);

$(document).on('click', '#salvar-sprint', function (e) {
    let tarefa = $('#tarefas-form').serializeArray();
    let id_sprint = $('#sprint_id').val();
    tar.salvarTarefa(tarefa, id_sprint);
});

$(document).on('click', '#tarefas-tabela-row tr td', function () {
    let id = $(this).closest('tr').data('tarefa');
    tar.apresentarForm(id);
});