$(function () {


    /*Captura alteração no select #estado */
    $("#estado").change(function () {
        var id_estado = $(this).val();
        $("#cidade").val("");//Esvazia o campo município
        $("#cidade_id").val("");//Esvazia o campo município        
        /* Verifica se foi selecionado algum estado válido*/
        if (id_estado !== "" && id_estado > 0 && id_estado < 28) {
            $("#cidade").prop('title', "Comece a digitar o nome da cidade");
            $("#cidade").prop('disabled', false);// Habilita o campo município para preenchimento

        } else {
            $("#cidade").prop('disabled', true); // Desabilita o campo município para preenchimento
        }



    });





    $("#cidade").autocomplete({
        source: function (request, response) {
            id_estado = $("#estado").val();
            action = './?page=endereco&action=getMunicipiosDoEstadoByNameInJson';
            $.ajax({
                type: 'POST',
                url: action,
                cache: false,
                data: {
                    estado_id: id_estado,
                    municipio_nome:  request.term 
                },
                success: function (data) {
                    response(jQuery.parseJSON(data));
                }
            })
        },
        minLength:3
    });






});

function getCidades(estado_id) {
    action = './?page=endereco&action=getNomeMunicipiosDoEstadoByIdJson';
    $.ajax({
        type: 'POST',
        url: action,
        cache: false,
        data: {
            'estado_id': estado_id
        }
    })
}

   