$(function () {
    /**
     Script feito para trabalhar com as requisições do pagseguro
     Início de produção em 01/08/2017.
     @author Ivan Alves da Silva - ivan.alves@outlook.com
     */

    /*  A varíavel do tipo array  - cartoesDisponiveis
    * Receberá todos os cartões disponíveis para pagamentos - Ofertado pelo pagSeguro
    * O array terá o indice [name] que vai receber o displayName do cartão
    * ---------- e o índice [img] que vai armazenar o link relativo da imagem daquele cartão
    * a imagem será a continuidade do link a partir de https://stc.pagseguro.uol.com.br
    */
    var cartoesDisponiveis = [];

    /**
     * Após a confirmação disponibilizar como AVAILABLE ou disponível.
     * @type {string}
     */
    var boleto = '';


    getMetodos();

    /**
     * Configura os arrays com os métodos e pagamentos
     * @param total - Valor da compra, opcional
     */
    function getMetodos(total =null) {
        PagSeguroDirectPayment.getPaymentMethods({
            amount: total,
            success: function (response) {
                if (response.paymentMethods.BOLETO.options.BOLETO.status === 'AVAILABLE') {//Verifica a disponibilidade dos boletos
                    boleto = response.paymentMethods.BOLETO.options.BOLETO.status; //Atribui o status a varável boleto
                }
                el = response.paymentMethods.CREDIT_CARD.options;
                var arr = Object.values(el);
                for (i = 0; i < arr.length; i++) {
                    if (arr[i].status === 'AVAILABLE') {//Obtêm os cartões diponíveis
                        cartoesDisponiveis[i] = [];
                        if (cartoesDisponiveis[i]['displayName'] = arr[i].displayName !== undefined){
                            cartoesDisponiveis[i]['displayName'] = arr[i].displayName;//Registra o nome de exibição do cartão no array cartões disponíveis
                            cartoesDisponiveis[i]['img'] = arr[i].images.SMALL.path; //Registra o caminho para o ícone do carão atual
                            cartoesDisponiveis[i]['name'] = arr[i].name;
                        }
                    }
                }
            },
            error: function (response) {
                alert("Ocorreu algum erro na consulta aos métodos de pagamentos disponíveis")
            },
            complete: function (response) {
                console.log(cartoesDisponiveis);
            }
        });

    }


    //Pega o código de vendedor - deve ser depois da página ter sido carregada totalmente
    var sender = PagSeguroDirectPayment.getSenderHash();

    $("#botao").click(function () { /*Teste da  leitura dos nomes dos cartões  */
        var htmlOl = '';
        var linkSrc = 'https://stc.pagseguro.uol.com.br';
        for (x = 0; x < cartoesDisponiveis.length; x++) {
            if (cartoesDisponiveis[x] !== undefined) {
                cart = cartoesDisponiveis[x];
                htmlOl = htmlOl.concat('<li>' + cart.name + '<img src=\"' + linkSrc + cart.img + '\">' + '</li>');
            }
        }
        $("ol").html(htmlOl);

    });


/*    getBrandInInput('testeIN');*/

    /**
     *
     * @param idOfInput
     * @return o nome apresentável da bandeira de cartão de crédito
     */
    function getBrandInInput(idOfInput = 'cardNumber') {
        idOfInput =idOfInput;
        $("input#"+idOfInput).on('keyup',function () {
            var textoInserido=$(this).val();
            if (textoInserido.length === 6){
                PagSeguroDirectPayment.getBrand({
                    cardBin: $(this).val(),
                    success: function(response) {

                    },
                    error: function(response) {
                        console.log('Algo deu errado');
                    },
                    complete: function(response) {
                        console.log(response);
                    }
                });
            }

        })
    }



})





