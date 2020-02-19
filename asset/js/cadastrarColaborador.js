$(document).ready(function () {
    let colaborador = new Colaborador();
    colaborador.getColaboradores();

    $(document).on('click', '#btn-addColaborador', function () {
        $('#modalCadastrarColaborador').modal('show');
    });

    $(document).on('click', '#spt-salvar-colaborador', function (e) {
        e.preventDefault();
        let form = $('#cadastrarColaborador').serializeArray();
        colaborador.addColaborador(form);
    });

    $(document).on('click', '.delete', function(e) {
        let id = $(this).data('id');
        let row = $(this).closest();
        console.log(id, row);
        $('#id').val(id);
        $('#modalDeletarColaborador').modal('show');
    });

    $(document).on('click', '#spt-deletar-colaborador', function(e) {
        e.preventDefault();
        let id = $('#id').val();
        colaborador.remove(id);
    });
});

class Colaborador {

    getColaboradores() {
        $.post('../controller/ColaboradorController.php', "buscarTodosColaboradores", function (result) {
            let data = Array();
            $(result).each(function (index, value) {
                data.push([
                    value.id,
                    value.nome,
                    value.funcao,
                    value.status == true ? 'Ativo' : 'Inativo',
                    `<img data-id="${value.id}" class="edit" src="https://img.icons8.com/material-outlined/24/000000/pencil-tip.png" />
                    <img data-id="${value.id}" class="delete" src="https://img.icons8.com/material-outlined/24/000000/add-trash.png" />`
                ]);
            })

            $('#tabela-colaboradores').DataTable({
                "data": data,
                "columns": [
                    { "title": "Código" },
                    { "title": "Nome" },
                    { "title": "Cargo" },
                    { "title": "Status" },
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

    addColaborador(form){
        $.post('../controller/ColaboradorController.php', {"cadastrarColaborador": form}, function(result){
            if(result[0].col_id > 0) {
                $('#mensagem').html('Colaborador criado com sucesso.');
                setTimeout(function() {
                    let tabela = $('#tabela-colaboradores').DataTable();
                    tabela.row.add([
                        result[0].col_id,
                        form[0].value,
                        form[1].value,
                        'Ativo',
                        `<img class="edit" src="https://img.icons8.com/material-outlined/24/000000/pencil-tip.png" />
                        <img class="delete" src="https://img.icons8.com/material-outlined/24/000000/add-trash.png" />`
                    ]);
                    
                    $('#mensagem').html('');
                    $('#modalCadastrarColaborador').modal('hide');
                    window.location.reload(true);
                }, 1500);
            }
        }, "json");
    }

    remove(id) {
        $.ajax({
            url: '../controller/ColaboradorController.php',
            type: 'DELETE',
            data: {'deletarColaborador': id},
            success: function(result) {
                
                setTimeout(function() {
                    $('#mensagem').html('');
                    window.location.reload(true);
                }, 1000);
            }
        });
    }
}