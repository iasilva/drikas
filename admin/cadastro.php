<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de <?php print $_GET['cad']?></title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/base-style.css">
    </head>
    <body>
        <?php require_once '../vendor/autoload.php';?>         
        <?php require_once './html/header.php'; ?> <!--Inclui o header da página - ainda básico e estático-->
        
        <?php 
        
        switch ($_GET['cad']) {
            case 'pelicula':
                require_once './html/cad-pelicula.php';
                break;

            default:
                $msg    = new Thirday\Messages\MensagemFactory;
                echo "<div class=\"container\"> ";
                $msg->exibeMensagem(new Thirday\Messages\ErrorMessage(),"É necessário"
                        . " escolher um item através do menu <strong>\"cadastrar\"</strong> ");
                echo "</div>";
                break;
        }
        
        ?>
        

        <?php require_once './html/footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático--> 

    </body>



    <script src="../script/jquery/jquery-3.2.1.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>
