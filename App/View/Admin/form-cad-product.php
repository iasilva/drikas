
<?php include_once HTML_DIR . DS . 'admin-head.php'; ?>
<?php include_once HTML_DIR . DS . 'admin-header.php'; ?>

<main class="container">

    <?php
    require_once '../vendor/autoload.php';

    $cat = new Thirday\Classes\Categoria();
    ?>

    <div class="row">
        <div class="col-sm-6 col-md-5 col-lg-4">
            <?php
            // Exibe a mensagem em caso de sucesso no cadastro
            $msg = new Thirday\Messages\MensagemFactory;

            if (isset($_GET['success'])) {
                $msg->exibeMensagem(new Thirday\Messages\SuccessMessage(), " Cadastro realizado com sucesso ");
            }
            ?>
            <form enctype="multipart/form-data" method="POST" action="./?page=product&action=insert">
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Descreva" autofocus>
                </div>
                
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="number" value="2.49" class="form-control" name="price" id="price">
                </div>
                <div class="form-group">
                    <label for="category">Categoria</label>
                    <div class="checkbox">
                        <?php foreach ($categories as $categoria) { ?>
                            <label>
                                <input name="categories[]" value="<?php echo $categoria->getId() ?>" type="checkbox"> 
                                <?php echo $categoria->getName() ?></option>    
                            </label>
                        <?php } ?>   
                    </div>


                </div>
                <div class="form-group">
                    <label for="image">Escolha a imagem</label>
                    <input type="file" class="form-control" name="product_image" id="product_image" required>
                    <span class="help-block alert-warning">Tamanho máximo permitido é 1Mb.</span>
                </div>
                <div class="form-group">
                    <label for="tags">Etiquetas</label>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="Descreva">
                     <span class="help-block alert-warning">Escreva palavras separada por espaço ou vírgula.</span>
                </div>
                <div class="form-group">
                    <input class="btn btn-success btn-lg" type="submit" value="Cadastrar película">

                </div>
            </form>

        </div>
        <div class="col-sm-12 col-md-4 col-md-offset-2">
            <h5><strong>Prévia da imagem</strong></h5>
            <div id="previa-imagem">
                
            </div>
           
        </div>
    </div>  


</main>
<?php require_once HTML_DIR . DS . 'admin-footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático--> 
</body>
</html>
