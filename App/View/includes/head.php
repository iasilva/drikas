<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $page_title ?> Drika's a melhor loja de películas e joinhas de unhas</title>
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto+Mono|Slabo+27px" rel="stylesheet">
        <link rel="stylesheet" href="./css/base-style.css">
        <?php if (isset($_GET['page']) && ($_GET['page'] === 'pedido')): ?><!--Inclui caso seja nas páginas de pedido-->
        <link rel="stylesheet" href="./css/pedido.css">
        <?php endif; ?><!--Finaliza if para página de pedidos-->

    </head>
    <body>