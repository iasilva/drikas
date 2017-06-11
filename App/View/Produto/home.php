<?php include_once VIEW_DIR . '/includes/head.php'; ?>
<?php include_once VIEW_DIR . '/includes/header.php'; ?>

<main class="container" id="produtos">
    <div class="row">
        <h3><?php print $h1; ?></h3>
        <p>Visualização de todos produtos </p>

        <?php
        foreach ($products as $produto) {
            ?>
            <article class="col-xs-6 col-sm-3 col-md-2 product-home">
                <header>Cód.: <?php echo $produto->getId() ?> </header>
                <label class="zueira">
                    <img class="img-responsive img-rounded primary-home" src="images/peliculas/<?php echo $produto->getImages()->getName() ?>">
                    <div class="checkbox text-center">
                        <input type="checkbox" value="<?php echo $produto->getId() ?>">Eu quero
                    </div>
                </label>
            </article>
        <?php } ?>
    </div>
    <div class="row" id='retorno'>
        
    </div>
</main>
<?php require_once VIEW_DIR . '/includes/footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático--> 
</body>
</html>
