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
    
    
    
    
});