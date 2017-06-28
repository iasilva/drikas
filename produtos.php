<!DOCTYPE html>
<?php require_once './vendor/autoload.php'; ?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Escolha as imagens que deseja</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/base-style.css">
        <style>
            .custom-combobox {
                position: relative;
                display: inline-block;
            }

            .custom-combobox-input {
                margin: 0;
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>

        <div class="form-group">
            <label class="control-label" for="email">Email</label>
            <input type="email" name="email" class="form-control"  aria-describedby="helpBlock2">
            <span id="helpEmail" class="help-block"></span>
        </div>
        
<!--        <div class="form-group">
            <label class="control-label" for="name">Nome</label>
            <input type="text" name="cpf" class="form-control"  aria-describedby="helpBlock2">
            <span id="helpNome" class="help-block"></span>
        </div>-->










    </body>



    <script type="text/javascript" src="script/jquery/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="script/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript"  src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">

        $(function () {
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
        });



    </script>
</html>
