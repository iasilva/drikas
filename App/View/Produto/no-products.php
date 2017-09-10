<?php include_once VIEW_DIR . '/includes/head.php'; ?>
<?php include_once VIEW_DIR . '/includes/header.php'; ?>
<div class="container-fluid barra-top-notice-blue">
    <div class="row">
        <div class="col-xs-12">
            <div class="container">
                <h1><?php echo $h1?> </h1>
            </div>
        </div>
    </div>

</div>
<main class="container" id="produtos">
    <div class="row">


        <!--Navegação das categorias em desenvolvimento-->

        <aside class="nav text-center">

            <?php if(isset($tags)): foreach ($tags as $tag): ?>
                <a href="./?page=product&action=tagView&name=<?php echo $tag->getName() ?>"><?php echo $tag->getName() ?></a>
            <?php endforeach; endif;?>
        </aside>

        <!--Final da navegação das tags-->


    </div>
    <div class="row">


        <div class="jumbotron">
            <h1><span class="glyphicon glyphicon-alert" style="color: red"></span> UOU! Deu ruim.</h1>
            <p>Não encontramos nenhum produto relacionado a sua consulta.</p>

        </div>


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
