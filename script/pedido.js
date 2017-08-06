/**
 * Created by ivana on 24/07/2017.
 */

$(function () {

    /* Exibe e esconde os dados do Cartão de crédito*/
    metodoEscolhido = $("input[name='payment-method']");
    $(metodoEscolhido).change(function () {
        $("#card-submit").hide();
        if (($(this).val()) === 'cartao') {
            $("button[type='submit']").text('Processar pagamento');
            $("#credit-card").show(1000);
            $("#card-submit").show(1100);
        } else {
            $("button[type='submit']").text('Gerar boleto');
            $("#credit-card").hide(400);
            $("#card-submit").show(400);
        }

    });


    novoEndereco = $("input[name='new-endereco']");
    $(novoEndereco).change(function () {
        if (($(this).val()) === 'true') {
            $("#new-endereco-card").show(1000);
        } else {
            $("#new-endereco-card").hide(400);
        }
    });


    /**
     * Verificações a serem realizadas no momento do envio do formulário
     */
    $("#form-payment-submit").click(function () {
        cardRequired();
        console.log(msgCard);
        if ($("input[name='payment-method']:checked").val() === 'cartao') {
            cardRequired();
            if (msgCard !== null) {
                $("#alert-card").html(msgCard);
                $("#alert-card").show(400);
                return false;
            } else {
                return true;
            }
        }


    })


    /**
     * Máscara para o campo cpf;
     */
    $("input[name='cpf']").mask("000.000.000-00");
    /**
     * Máscara para o campo cep;
     */
    $("input[name='cep']").mask("00000-000");
});

/**
 * Função torna todos os campos do cartão de crédito como requerido
 */
var msgCard = null;

function cardRequired() {
    cn = $("input#card-number");
    ch = $("input#card-holder");
    cvv = $("input#cvv");
    cpf = $("input#cpf");
    cv = $("input#card-validade");
    if (cn.val() === '') {
        msgCard = "O número do cartão é um campo obrigatório";
        return;
    } else if (ch.val() === '') {
        msgCard = "O nome do titular do cartão é um campo obrigatório";
        return;
    } else if (cvv.val() === '') {
        msgCard = "O código de verificação do cartão é um campo obrigatório. <span class='text-muted'>Esse código encontra-se no verso do seu cartão</span>";
        return;
    } else if (cpf.val() === '') {
        msgCard = "O CPF do titular do cartão é um campo obrigatório.";
        return;
    } else if (cv.val() === '') {
        msgCard = "A validade do cartão é um campo obrigatório.";
        return;
    } else {
        msgCard = null;
    }


}
