
<?php include_once HTML_DIR.DS.'admin-head.php'; ?>
<?php include_once HTML_DIR.DS.'admin-header.php'; ?>

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
                   
                    if(isset($_GET['success'])){
                    $msg->exibeMensagem(new Thirday\Messages\SuccessMessage(),
                            " Cadastro realizado com sucesso ");                 
                        
                    }
                    ?>
            <form enctype="multipart/form-data" method="POST" action="processa.php?action=uploadImagem">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descreva">
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="" selected="selected"> Escolha uma categoria</option>    
                        <?php
                        //Código usa a classe Categoria e chama o metodo que retorna
                        // um array de objetos com as categorias
                        $categorias = $cat->getCategories();
                        foreach ($categorias as $cat) {
                            echo "<option value=\"{$cat->id}\">{$cat->nome}</option>\n";
                        }
                        ?>
                    </select>
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
<?php require_once HTML_DIR.DS.'admin-footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático--> 
</body>
</html>
