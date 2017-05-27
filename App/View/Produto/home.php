<?php include_once VIEW_DIR . '/includes/head.php'; ?>
<?php include_once VIEW_DIR . '/includes/header.php'; ?>

<main class="container">

    <h3>Página de visualização dos produtos</h3>
    <p>Visualização de todos produtos </p>

    <?php
    foreach ($products as $produto) {
        ?>
        <article class="col-xs-6 col-sm-3 col-md-2">
            <header>Cód.: <?php echo $produto->getId() ?> </header>
            <img class="img-responsive img-rounded" src="images/peliculas/<?php echo $produto->getImages()->getName() ?>">
            <div class="checkbox text-center">
                <label><input type="checkbox" value="<?php echo $produto->getId() ?>">Eu quero</label>
            </div>
        </article>
    <?php } ?>

</main>
<?php require_once VIEW_DIR . '/includes/footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático--> 
</body>
</html>
