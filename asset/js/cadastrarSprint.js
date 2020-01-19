$(document).ready(function(e){

    $(document).on('change', '#qtdDiasSprint', function(e){
        let dias = $('#qtdDiasSprint').val();
        console.log(dias);
        adicionarDias(dias);
    });

    $(document).on('click', '#salvar-sprint', function(e){
        e.preventDefault();
        let form = $('#formCadastrar').serializeArray();
        form.push({name: 'salvarSprint', value: true})
        // console.log(form)
        $.ajax({
            url: './controller/sprintController.php',
            method: "POST",
            data: form,
            dataType: 'json',
            success: function(result) {
                console.log(result)
            }
        });
    })
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