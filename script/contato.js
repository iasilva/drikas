$(function () {

    $('form#contact-form').submit(function () {
        $("#modal-enviando-email").modal({
            keyboard: false,
            backdrop:false,
            show:true
        });
        /!*$("#modal-enviando-email").modal('show');*!/
        dados=$(this).serialize();
        action = './?page=contact&action=sendContactAjax';
        $.ajax({
            type: 'POST',
            url: action,
            cache: false,
            data: dados,
            dadosType:'json',
            success: function (data) {
                if (data =='OK'){
                    $("#return-servidor").html("<div class=\"alert alert-success\" role=\"alert\">" +
                        "Mensagem enviada com sucesso. Entraremos em contato com urgência.</div>");
                        limpaCamposForm();
                }else{
                    $("#return-servidor").html("<div class=\"alert alert-error\" role=\"alert\">Algo deu errado! Tente em instantes</div>");
                }
            },
            complete:function (data) {
                $("#modal-enviando-email").modal('hide');
            }
        });
        return false;
    });

        function limpaCamposForm() {
            $("#form-contact-email").val('');
            $("#form-contact-name").val('');
            $("#form-contact-mensagem").val('');
        }


});