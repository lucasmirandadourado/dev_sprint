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
                let qtd = tarefas.qtd_colaboradores;

                $('#nome-sprint').text(tarefas.name);
                $('#dias-sprint').text(tarefas.data_inicio);
                $("#colaborador-sprint").text(qtd);

                let data = Array();
                if (tarefas.tarefas.length > 0) {
                    tarefas.tarefas.forEach(element => {
                        data.push([
                            element.codigo,
                            element.titulo,
                            element.descricao,
                            moment(element.hora_estimada, 'hh:mm:ss').format('hh:mm'),
                            `<img data-id="${element.id}" alt="Editar sprint" class="edit" src="https://img.icons8.com/material-outlined/24/000000/pencil-tip.png" />
                            <img data-id="${element.id}" alt="Deletar sprint" class="delete" src="https://img.icons8.com/material-outlined/24/000000/add-trash.png" />`
                        ]);
                    });
                }

                $('#tabela-tarefas').DataTable({
                    "data": data,
                    initComplete: function () {
                        $(this.api().table().container()).
                            find('input').parent().wrap('<form>').parent()
                            .attr('autocomplete', 'off');
                    },
                    "columns": [
                        { "title": "Código" },
                        { "title": "Título" },
                        { "title": "Descrição" },
                        { "title": "Horas" },
                        { "title": "" }
                    ],
                    "language": {
                        "lengthMenu": "Apresentar _MENU_ itens por página",
                        "zeroRecords": "Não foi encontrado itens",
                        "info": "Apresentar page _PAGE_ de _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtro de _MAX_ total itens)"
                    }
                });

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
                setTimeout(function (e) {
                    window.location.reload();
                }, 1500);
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

            }
        });
    }

    deletar(id) {
        $.ajax({
            url: '../controller/TarefasController.php',
            method: "DELETE",
            dataType: 'json',
            data: { delete: id },
            success: function (result) {
                console.log(result);
                if (result) {
                    window.location.reload();
                }
            }
        });
    }

    editar(form) {

    }

    buscarTarefasSelect() {
        $.get('../controller/TarefasController.php', {'buscarTarefaSelect': true}, function(result) {
            $('#tarefas_bug').select2({
                placeholder: 'Selecione a tarefa',
                width: '200px',
                data: result
            });
        }, 'json');

        $('#tarefas_bug').css({'display': 'flex'});
    }
}

let tar = new Tarefa();
let id_sprint = $('#sprint_id').val();
tar.getTarefas(id_sprint);

$(document).on('click', '#salvar-sprint', function (e) {
    e.preventDefault();
    let tarefa = $('#tarefas-form').serializeArray();
    let id_sprint = $('#sprint_id').val();
    $('#salvar-sprint').remove();
    tar.salvarTarefa(tarefa, id_sprint);
});

$(document).on('click', '#tarefas-tabela-row tr td', function () {
    let id = $(this).closest('tr').data('tarefa');
    tar.apresentarForm(id);
});

document.getElementById('addTarefa').addEventListener('click', function (e) {
    $('#modalCadastrarTarefa').modal('show');
});


$(document).on('click', '.delete', function (e) {
    $('#modalDeletarTarefa').modal('show');
    let id = $(this).data('id');
    $('#idTarefa').val(id);
});

$(document).on('click', '#deletar-tarefa', function (e) {
    let id = $('#idTarefa').val();
    tar.deletar(id);
});

$(document).on('click', '#bug', function (e) {
    $( "#bug" ).prop( "checked", true );
    tar.buscarTarefasSelect();
});