$(document).ready(function () {
    let colaborador = new Colaborador();
    colaborador.__getColaboradores();
});

class Colaborador {

    __getColaboradores() {
        $.post('../controller/ColaboradorController.php', "buscarTodosColaboradores", function (result) {
            let data = Array();
            $(result).each(function (index, value) {
                data.push([
                    value.id,
                    value.nome,
                    value.funcao,
                    value.status == true ? 'Ativo' : 'Inativo',
                    `<img class="edit" src="https://img.icons8.com/material-outlined/24/000000/pencil-tip.png" />
                    <img class="delete" src="https://img.icons8.com/material-outlined/24/000000/add-trash.png" />`
                ]);
            })

            $('#tabela-colaboradores').DataTable({
                "data": data,
                "columns": [
                    { "title": "id" },
                    { "title": "nome" },
                    { "title": "cargo" },
                    { "title": "Status" },
                    { "title": "acao" }
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
}