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
     * Máscara para o campo cpf;
     */
    $("input[name='cpf']").mask("000.000.000-00");
    /**
     * Máscara para o campo cep;
     */
    $("input[name='cep']").mask("00000-000");
});