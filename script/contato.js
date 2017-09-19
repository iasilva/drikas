$(function () {

    $('form#contact-form').submit(function () {
        $("#modal-enviando-email").modal({
            keyboard: false,
            backdrop:false,
            show:true
        });
        /*$("#modal-enviando-email").modal('show');*/
        dados=$(this).serialize();
        action = './?page=contact&action=sendContactAjax';
        $.ajax({
            type: 'POST',
            url: action,
            cache: false,
            data: dados,
            dadosType:'json',
            success: function (data) {
                $("#return-servidor").html(data);
            },
            complete:function (data) {
                $("#modal-enviando-email").modal('hide');
            }
        });


        return false;


    });









});