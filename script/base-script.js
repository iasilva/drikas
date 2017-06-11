jQuery(function () {
//    Procedimento para exibição da prévia da imagem da películaF
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
     * Captação do produto e adição ao carrinho
     */

    produto = $("#produtos article input[type=checkbox]");


    produto.change(function () {
        product_id = $(this).val();
        img_prod = $(this).parent().parent().children('img');
        formatImageProduct(img_prod); 
        updateCart(product_id);        
        
    });
    function updateCart(product_id) {
        action='./?page=teste&action=updateCart';
        $.ajax({
            type: 'POST',
            url: action,
            data: {'product_id':product_id},
            success:function (dados) {
                $("#retorno").hide().fadeIn(1500).html(dados);
            }
            
        });
    }
    function formatImageProduct(img_prod) {
         altura = $(img_prod).css('height');        
        $(img_prod).css({border:'4px solid green','height':altura});
    }



});