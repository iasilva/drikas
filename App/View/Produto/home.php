<?php include_once VIEW_DIR . '/includes/head.php'; ?>
<?php include_once VIEW_DIR . '/includes/header.php'; ?>

<main class="container" id="produtos">
    <div class="row">
        <header class="header-page">
            <h4 class="bg-primary text-center"><?php print $h1; ?></h4>
        </header>
    </div>
    <div class="row">


        <?php
        foreach ($products as $produto) {
            ?>
            <article class="col-xs-6 col-sm-3 col-md-2 product-home">
                <header>Cód.: <?php echo $produto->getId() ?> </header>
                <label>
                    <img class="img-responsive img-rounded primary-home" title="<?php echo $produto->getDescription() ?>"
                         alt="Imagem - <?php echo $produto->getDescription() ?> - Drika's"
                         src="images/peliculas/<?php echo $produto->getImages()->getName() ?>">
                    <div class="checkbox text-center">
                        <input type="checkbox" value="<?php echo $produto->getId() ?>">Eu quero
                    </div>
                </label>
            </article>
        <?php } ?>
    </div>
    <a href="./?page=cart" class="cart-icon-pink" title="Ir para o caixa"><span id="cart-flutuante"><strong ></strong></span></a>
</main>
<?php require_once VIEW_DIR . '/includes/footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático--> 
</body>
</html>
