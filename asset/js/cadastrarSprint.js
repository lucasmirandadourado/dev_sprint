$(document).ready(function (e) {

    $('#exampleModal').on('shown.bs.modal', function () {
        $('#exampleModal').medal('show')
    })

    $('#tarefas-tabela').DataTable();

    $(document).on('change', '#qtdDiasSprint', function (e) {
        let dias = $('#qtdDiasSprint').val();
        adicionarDias(dias);
    });

    $(document).on('click', '#sp-salvar-sprint', function (e) {
        e.preventDefault();

        let nome = $('#nome').val();
        let dias = $('#qtdDiasSprint').val();
        let qtdDev = $('#qtdDevs').val();
        let datas = $('input[name="data[]"]').serializeArray();
        let data = {
            "salvarSprint": true,
            "sprint": {
                "nome": nome,
                "dias": dias,
                "qtdDev": qtdDev,
                "datas": datas
            }
        }

        $.ajax({
            url: '../controller/SprintController.php',
            method: "POST",
            data: data,
            dataType: 'json',
            success: function (result) {
                console.log(result);
                if(result[0]) {
                    window.location = './cadastrar-tarefas.php';
                }
            }
        });
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