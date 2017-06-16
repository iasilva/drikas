jQuery(function () {
    /**Sempre quando carregar a pÃ¡gina ele insere quantidade de produtos constantes no carrinho*/
    updateIcon();


//    Procedimento para exibiÃ§Ã£o da prÃ©via da imagem da pelÃ­culaF
    $("#product_image").on('change', function () {
        if (typeof (FileReader) != "undefined") {
            var image_holder = $("#previa-imagem");
            image_holder.empty();
            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "img-responsive img-thumbnail",
                    "height": '190px',
                    "width": '130px'
                }).appendTo(image_holder);
            };
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("Este navegador nao suporta FileReader.");
        }
    });

    /**
     * CaptaÃ§Ã£o do produto e adiÃ§Ã£o ao carrinho
     */
    /*Captura o checkbox*/
    produto = $("#produtos article input[type=checkbox]");
    /** percorre cada item de produto verificando se o mesmo esta na sacola*/
    $.each(produto, function (key, value) {
        prod_id = $(value).val();
        img_this = $(value).parent().parent().children('img');
        existeItemInCart(prod_id, img_this, value);
    });

    produto.change(function () {
        product_id = $(this).val();
        img_prod = $(this).parent().parent().children('img');
        updateCart(product_id, img_prod);

    });
    /**
     * Veerifica se aquele produto esta no carrinho
     * @param {type} product_id id dor produto atual que vai verificar
     * @param {type} img_this referencia a imagem principal do produto no DOM
     * @param {type} item referencia ao checkBox atual do produto
     * @returns retorna imagem formatada e o checkbox marcado, caso o produto
     *  esteja no carrinho
     */
    function existeItemInCart(product_id, img_this, item) {
        action = './?page=cart&action=has';
        $.ajax({
            type: 'POST',
            url: action,
            cache: false,
            data: {'product_id': product_id},
            success: function (dados) {
                if (dados === '1') {
                    formatImageProduct(img_this);
                    $(item).attr('checked', true);
                } else {
                    $(img_this).css({border: 'none'});
                    $(item).attr('checked', false);
                }

            }

        });

    }
    /**
     * Insere e exclui produto no carrinho
     * @param {type} product_id Produto a ser atualizado
     * @param {type} img_prod referencia a imagem do produto no DOM
     * @returns retorna a imagem formatada
     */
    function updateCart(product_id, img_prod) {
        action = './?page=cart&action=ajaxUpdateCart';
        $.ajax({
            type: 'POST',
            url: action,
            cache: false,
            data: {'product_id': product_id},
            success: function (dados) {
                if (dados === '1') {
                    formatImageProduct(img_prod);
                } else {
                    $(img_prod).css({border: 'none'});
                }
                updateIcon();
            }

        });
    }
    /**
     * Conta e atualiza o icone do carrinho de compras com a quantidade atual 
     * de produtos no carrinho
     * @returns {undefined}
     */
    function updateIcon() {
        action = './?page=cart&action=ajaxCountItens';
        $.ajax({
            type: 'POST',
            url: action,
            cache: false,
            success: function (dados) {
                var valor;
                if (dados < 10) {
                    valor = '0' + dados;
                } else {
                    valor = dados
                }
                $("#item-in-cart").html(valor);
                $("#cart-flutuante").html(valor);
            }

        });
    }
    /**
     * 
     * @param {type} img_prod referÃªncia a uma imagem do DOM
     * @returns retorna uma imagem formatada com uma borda verde;
     */
    function formatImageProduct(img_prod) {
        altura = $(img_prod).css('height');
        $(img_prod).css({border: '4px solid green', 'height': altura});
    }



    /** Jquery responsável pela atualização e manutenção do carrinho de compras*/


    /**      
     *Ação disparada quando se altera a quantidade pedida na cartela.
     */
    /**     
     * @Object $unds  - Representa o select de unidades
     */
    var unds = $("select[name='cart-und']");  //select [cartela]  
    $(unds).change(function () {
        celulaAtual = $(this).parent();// célula que envolve a cartela
        linhaAtual = $(celulaAtual).parent(); //Linha que envolve a película      
        qtdAtualNaCartela = $(this).val(); // Quantidade selecionada de unidades na cartela        
        product_id = $(linhaAtual).children("[name='product_id']").val();
        quantidadeAtualDeCartelas = $(celulaAtual).next().next().children('input').val();
        /** Substitui o preço com base na quantidade de películas informadas*/

        ajaxUpdateCart(product_id, qtdAtualNaCartela, quantidadeAtualDeCartelas);
    });

    /** Quando altera a quantidade de cartelas - clique em atualizar*/

    $(".btn-update-item").click(function(){
        linhaAtual = $(this).parent().parent(); //Linha que envolve a película  
        quantidadeAtualDeCartelas= $(linhaAtual).children().children("input[name='cart-quantity']").val(); // Quantidade de cartelas informadas 
        qtdAtualNaCartela=$(linhaAtual).children().children("select[name='cart-und']").val();
        product_id = $(linhaAtual).children("[name='product_id']").val();             
        ajaxUpdateCart(product_id, qtdAtualNaCartela, quantidadeAtualDeCartelas);
    });
    
   
    /**
     * 
     * @param {type} product_id
     * @param {type} qtdNaCartela
     * @param {type} quantidadeAtualDeCartelas
     * @returns {undefined}
     */

    function ajaxUpdateCart(product_id, qtdNaCartela, quantidadeAtualDeCartelas) {

        /**Atualização do carrinho na página carrinho*/
        action = './?page=cart&action=ajaxUpdateItemInTheCart';
        $.ajax({
            type: 'POST',
            url: action,
            cache: false,
            data: {'product_id': product_id,
                'qtdNaCartela': qtdNaCartela,
                'quantidadeAtualDeCartelas': quantidadeAtualDeCartelas
            },
            success: function (dados) {
                window.location.reload();
            }

        });

    }









});