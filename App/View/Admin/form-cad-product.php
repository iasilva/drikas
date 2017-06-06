
<?php include_once HTML_DIR . DS . 'admin-head.php'; ?>
<?php include_once HTML_DIR . DS . 'admin-header.php'; ?>

<main class="container">

    <?php
    require_once '../vendor/autoload.php';

    $cat = new Thirday\Classes\Categoria();
    ?>

    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <?php
            // Exibe a mensagem em caso de sucesso no cadastro
            $msg = new Thirday\Messages\MensagemFactory;

            if (isset($_GET['success'])) {
                $msg->exibeMensagem(new Thirday\Messages\SuccessMessage(), " Cadastro realizado com sucesso ");
            }
            ?>
            <form enctype="multipart/form-data" method="POST" action="./?page=product&action=insert">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descreva">
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <div class="checkbox">
                            <?php foreach ($categories as $categoria) { ?>
                        <label>
                                <input name="category[]" value="<?php echo $categoria->getId() ?>" type="checkbox"> 
                                <?php echo $categoria->getName() ?></option>    
                        </label>
                            <?php } ?>   
                    </div>


<!--

                    <select class="form-control" id="category_id" name="category_id">
                        <option value="" selected="selected"> Escolha uma categoria</option>    
                        <?php foreach ($categories as $categoria) { ?>
                            <option value="<?php echo $categoria->getId() ?>"> <?php echo $categoria->getName() ?></option>    
                        <?php } ?>   
                    </select>-->
                </div>
                <div class="form-group">
                    <label for="imagem">Escolha a imagem</label>
                    <input type="file" class="form-control" name="imagem" id="imagem">
                </div>
                <div class="form-group">
                    <input class="btn btn-success btn-lg" type="submit" value="Cadastrar película">
                </div>
            </form>

        </div>
    </div>  


</main>
<?php require_once HTML_DIR . DS . 'admin-footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático--> 
</body>
</html>
