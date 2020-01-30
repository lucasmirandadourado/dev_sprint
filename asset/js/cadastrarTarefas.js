class Tarefa {

    constructor(){
        this.getTarefas();
    }

    getTarefas() {
        $.ajax({
            url: '../controller/TarefasController.php',
            method: "GET",
            dataType: 'json',
            data: {sprint: 12},
            success: function (result) {
                
                $('#nome-sprint').text(result.name);
                $('#colaborador-sprint').text(result.qtd_colaboradores);
                $('#dias-sprint').text(result.data_inicio);
        
            }
        });
    }

}

let tar = new Tarefa();