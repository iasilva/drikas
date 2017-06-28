$(function () {


    /*Captura alteração no select #estado */
    $("#estado").change(function () {
        var id_estado = $(this).val();
        $("#cidade").val("");//Esvazia o campo município
        $("#cidade_id").val("");//Esvazia o campo município  
        form_group_pai = $(this).parent();
        cidade_pai = $("#cidade").parent();
        /* Verifica se foi selecionado algum estado válido*/
        if (id_estado !== "" && id_estado > 0 && id_estado < 28) {
            $("#cidade").prop('disabled', false);// Habilita o campo município para preenchimento
            action = './?page=endereco&action=ajaxSelectMunicipios';
            $.ajax({
                type: 'POST',
                url: action,
                cache: false,
                data: {
                    estado_id: id_estado
                },
                success: function (data) {
                    $("#cidade").html(data);
                }
            });
            
        } else {//Caso seja um valor inválido
            $("#cidade").prop('title', "Para preencher, selecione o estado acima");
            $("#cidade").prop('disabled', true); // Desabilita o campo município para preenchimento
        }
    });


    $("select").change(function () {//Após a primeira alteração no select passa a marcar como válido ou inválido
        valor = $(this).val();        
         if (valor !== "" && valor > 0) {
             $(this).parent().addClass('has-success');
             $(this).parent().removeClass('has-error');
         }else{
             $(this).parent().addClass('has-error');
             $(this).parent().removeClass('has-success');
         }
        
    });





    /** Captura todas as mudanças de input e valida os dados*/
    $("input").change(function () {
        form_group_pai = $(this).parent();
        campo = $(this).prop('name');
        valor = $(this).val();

        action = './?page=user&action=validaUserAjax';
        $.ajax({
            type: 'POST',
            url: action,
            cache: false,
            data: {
                campo: campo,
                valor: valor
            },
            success: function (data) {
                if (data !== '1') {
                    $(form_group_pai).addClass('has-error');
                    $(form_group_pai).removeClass('has-success');
                    $(form_group_pai).children(".help-block").html(data);
                } else {
                    $(form_group_pai).children(".help-block").html('');
                    $(form_group_pai).removeClass('has-error');
                    $(form_group_pai).addClass('has-success');
                }
            }
        });
    });





    /*$("#cidade").autocomplete({ 
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
     });*///Autocomplete de cidades funcionando o básico










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

   