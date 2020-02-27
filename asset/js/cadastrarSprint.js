class Sprint {

    getSprints() {
        $.get('../controller/SprintController.php', 'buscarSprints', function(result){
            
            let data = Array();
            $(result).each(function (index, value) {
                console.log(value)
                data.push([
                    value.id,
                    value.name,
                    moment(value.data_inicio).format('DD/MM/YYYY'),
                    value.qtd_colaboradores,
                    value.horas == null ? 0 : value.horas,
                    value.qtd_tarefas,
                    `<img data-id="${value.id}" alt="Editar sprint" class="edit" src="https://img.icons8.com/material-outlined/24/000000/pencil-tip.png" />
                    <img data-id="${value.id}" alt="Deletar sprint" class="delete" src="https://img.icons8.com/material-outlined/24/000000/add-trash.png" />
                    <img data-id="${value.id}" alt="Tarefas do sprint" title="Tarefas do sprint" class="tarefas" src="../asset/icon//icons8-tarefas-50.png" />`
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

    salvarSprint(form) {
        $.post('../controller/SprintController.php', {"cadastrarSprint": form}, function (result) {
                if(result[0]) {
                    window.location.reload();
                }
        }, 'json');
    }

    buscarSprint(id) {
        $.get('../controller/SprintController.php', {"buscarSprint": id}, function(result) {
            
            $('#edt_nome').val(result.name);
            $('#edt_qtdDevs').val(result.qtd_colaboradores);
            $('#edt_qtdDiasSprint').val(Object.keys(result.dias).length);
            
            let tabelaDias = $('#dias_sprint').DataTable();
            tabelaDias.clear().draw();
            $(Object.values(result.dias)).each((element, index, array) => {                
                tabelaDias.row.add([
                    index,
                    `<img data-id="${index}" data-spt="${result.id}" alt="Remover dia" class="edt_delete" 
                            src="https://img.icons8.com/material-outlined/24/000000/add-trash.png" />`
                ]).draw( false );
            });
        }, "json");
    }

    delete(id) {
        $.ajax({
            url: '../controller/SprintController.php',
            method: "DELETE",
            dataType: 'json',
            data: { delete: id },
            success: function (result) {
                console.log(result);
                if(result) {
                    window.location.reload();
                }
            } 
        });
    }

    editar(form) {

    }

    deleteDia(id, sprint) {
        $.ajax({
            url: '../controller/SprintController.php',
            method: "DELETE",
            dataType: 'json',
            data: { deleteDia: id, spt: sprint },
            success: function (result) {
                if(result) {
                    let tabelaDias = $('#dias_sprint').DataTable();
                    tabelaDias.row('.selected').remove().draw( false );
                }
            }  
        });
    }

    addDia(spt, data) {
        $.ajax({
            url: '../controller/SprintController.php',
            method: "PUT",
            dataType: 'json',
            data: { addDia: data, spt: spt },
            success: function (result) {
                                
            }  
        })
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

    $(document).on('click', '#spt-salvar-sprint', function(e) {
        e.preventDefault();
        let form = $('#formCadastrar').serializeArray();
        sprint.salvarSprint(form);
    });

    $(document).on('click', '.edit', function(e){
        e.preventDefault();
        let id = $(this).data('id');
        $('#modalEditarSprint').modal('show');
        $('#sptId').val(id);
        sprint.buscarSprint(id);
    });

    $(document).on('click', '.delete', function(e){
        $('#modalDeletarSprint').modal('show');
        let id = $(this).data('id');
        $('#idSprint').val(id);
    });

    $(document).on('click', '#deletar-sprint', function(e){
        e.preventDefault();
        let id = $('#idSprint').val();
        sprint.delete(id);
    });

    $(document).on('click', '#addSprint', function(e) {
        $('#modalCadastrarSprint').modal('show');
    });

    $(document).on('click', '.edt_delete', function(e){
        e.preventDefault();
        let dia = $(this).data('id');
        let spt = $(this).data('spt');
        let tabelaDias = $('#dias_sprint').DataTable();

        if ( $(this).closest('tr').hasClass('selected') ) {
            $(this).closest('tr').removeClass('selected');
        } else {
            tabelaDias.$('.selected').removeClass('selected');
            $(this).closest('tr').addClass('selected');
        }

        sprint.deleteDia(dia, spt);
    });

    $(document).on('click', '#addDia', function(e) {
        e.preventDefault();
        let tabela = $('#add_dias_sprint').DataTable();
        let data = $('#data').val();
        tabela.row.add([
            data,
            `<img alt="Remover dia" class="edt_delete" 
                            src="https://img.icons8.com/material-outlined/24/000000/add-trash.png" />`
        ]).draw(false);
            $('#addDia').append(`<input type="hidden" name="data[]" value="${data}">`);
    });

    $(document).on('click', '#edt_addDia', function(e) {
        e.preventDefault();
        let tabela = $('#dias_sprint').DataTable();
        let spt = $('#sptId').val();
        let data = $('#edt_data').val();
        tabela.row.add([
            data,
            `<img data-spt="${spt}" alt="Remover dia" class="edt_delete" 
                            src="https://img.icons8.com/material-outlined/24/000000/add-trash.png" />`
        ]).draw(false);
        sprint.addDia(spt, data);
    });

    $(document).on('click', '.tarefas', function(e){
        let spt = $(this).data('id');
        window.location = `./cadastrar-tarefas.php?sprint=${spt}`;
    })
});

