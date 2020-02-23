class Sprint {

    getSprints() {
        $.get('../controller/SprintController.php', 'buscarSprints', function(result){
            
            let data = Array();
            $(result).each(function (index, value) {
                data.push([
                    value.id,
                    value.name,
                    moment(value.data_inicio).format('DD/MM/YYYY'),
                    value.qtd_colaboradores,
                    value.horas == null ? 0 : value.horas,
                    value.qtd_tarefas,
                    `<img data-id="${value.id}" alt="Editar sprint" class="edit" src="https://img.icons8.com/material-outlined/24/000000/pencil-tip.png" />
                    <img data-id="${value.id}" alt="Deletar sprint" class="delete" src="https://img.icons8.com/material-outlined/24/000000/add-trash.png" />`
                ]);
            });

            $('#tabela-sprint').DataTable({
                "data": data,
                initComplete: function() {
                    $(this.api().table().container()).
                    find('input').parent().wrap('<form>').parent()
                    .attr('autocomplete', 'off');
                },
                "columns": [
                    { "title": "Código" },
                    { "title": "Nome" },
                    { "title": "Data início" },
                    { "title": "Qtd. Programador" },
                    { "title": "Qtd. horas" },
                    { "title": "Hr Tarefas" },
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

        }, "json");
    }

    // TODO: 
    salvarSprint(form) {
        $.post('../controller/SprintController.php', {"cadastrarSprint": form}, function (result) {
                console.log(result);
                if(result[0]) {
                    window.location = './cadastrar-tarefas.php';
                }
        }, 'json');
    }

    buscarSprint(id) {
        window.location = `./cadastrar-tarefas.php?sprint=${id}`;
    }
}

sprint = new Sprint();
sprint.getSprints();

$(document).ready(function (e) {

    $(document).on('change', '#qtdDiasSprint', function (e) {
        let dias = $('#qtdDiasSprint').val();
        adicionarDias(dias);
    });


    $(document).on('change', '#qtdDiasSprint', function () {
        let qtd = $('#qtdDiasSprint').val();
        $('.datas-dias').html('');
        for (let i = 1; i <= qtd; i++) {
            let dias = `<div class="form-group mx-1 data-item">
                            <label for="data_${i}">Dias ${i}</label>
                            <input type="date" class="form-control" id="data_${i}" name="data[]">
                        </div>`;
            $('.datas-dias').append(dias);
        }
    });

    $(document).on('click', '#sp-salvar-sprint', function(e) {
        e.preventDefault();
        let form = $('#formCadastrar').serializeArray();
        sprint.salvarSprint(form);
    });

    $(document).on('click', '.edit', function(e){
        e.preventDefault();
        let id = $(this).data('id');
        console.log(id)
        sprint.buscarSprint(id);
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


