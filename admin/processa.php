<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de <?php print $_GET['cad'] ?></title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/base-style.css">
    </head>
    <body>
        <?php
        require_once '../vendor/autoload.php';

        $action = filter_input(INPUT_GET, "action", FILTER_DEFAULT);
       
        switch ($action) {
            case "uploadImagem":
                try {
                    $pel= new Thirday\Peliculas\peliculaCadastro;       //Instancia a classe que faz o cadastro             
                    $imgUpload = new Thirday\Imagem\UploadImagem();     // Instancia a que faz o upload
                     //Executa o upload e já setando o link na classe de cadastro
                    $pel->setImageLink("images/peliculas/".$imgUpload->exec("imagem"));    
                    $pel->exec();//Executa o registro no BD;
                    ?>
                        <script language= "JavaScript">
                        location.href="./cadastro.php?cad=pelicula&success";
                        </script>
                    <?php
                    
                } catch (Exception $exc) {
                 $msg = new \Thirday\Messages\MensagemFactory();
                 $msg->exibeMensagem(new \Thirday\Messages\ErrorMessage(), $exc->getMessage());
                }

                break;

            default:
                break;
        }