<?php include_once VIEW_DIR . '/includes/head.php'; ?>
<?php include_once VIEW_DIR . '/includes/header.php'; ?>

<main class="container" id="produtos">
    <div class="row">
        <header class="header-page">
            <h4 class="bg-primary text-center"><?php print $h1; ?></h4>
        </header>

        <!--Navegação das categorias em desenvolvimento-->

        <aside class="nav text-center">

            <?php if(isset($tags)): foreach ($tags as $tag): ?>
                <a href="#"><?php echo $tag->getName() ?></a>
            <?php endforeach; endif;?>
        </aside>

        <!--Final da navegação das categorias-->


    </div>
    <div class="row">

        <!--Dados experimentais para Nova Visualização-->







        <!--Final dos novos dados inseridos-->

        <?php
        foreach ($products as $produto) {
            ?>
            <article class="col-xs-6 col-sm-3 col-md-2 product-home">
                <header>Cód.: <?php echo $produto->getId() ?> </header>
                <label>
                    <img class="img-responsive img-rounded primary-home"
                         title="<?php echo $produto->getDescription() ?>"
                         alt="Imagem - <?php echo $produto->getDescription() ?> - Drika's"
                         src="images/peliculas/<?php echo $produto->getImages()->getName() ?>">
                    <div class="checkbox text-center">
                        <input type="checkbox" value="<?php echo $produto->getId() ?>">Eu quero
                    </div>
                </label>
            </article>
        <?php } ?>
    </div>

    <?php if(!empty($_GET['action'])): ?>

    <div class="row text-center bg-info"><a href="./?page=product">
            <div id="btn-view-plus"><span class="glyphicon glyphicon-plus-sign"></span> Ver todos os produtos</div>
        </a></div>

    <?php endif;?>


    <a href="./?page=cart" class="cart-icon-pink" title="Ir para o caixa"><span
                id="cart-flutuante"><strong></strong></span></a>
</main>
<?php require_once VIEW_DIR . '/includes/footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático-->
</body>
</html>
