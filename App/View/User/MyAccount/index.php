<?php include_once HTML_DIR . DS . 'head.php'; ?>
<?php include_once HTML_DIR . DS . 'header.php'; ?>

<div class="container-fluid barra-top-notice-blue">
    <div class="row">
        <div class="col-xs-12">
            <div class="container">
                <h1>Minha conta</h1>
            </div>
        </div>
    </div>

</div>


<main class="container" style="margin: 0">
    <!--Incluir um aside col-md-3-->
    <?php
    require_once dirname(__FILE__).'/aside.php';
    ?>





    <!--Quadro que engloba o quadro com botões informativos e o mural informativo-->
    <div class="col-md-8 col-md-offset-1" id="quadro-exposicao-pricipal">
        <div class="col-md-12" id="quadro-botoes-informativos">
            <div class="col-md-4"><div class="btn-rounded btn-rounded-1"></div></div>
            <div class="col-md-4"><div class="btn-rounded btn-rounded-2"></div></div>
            <div class="col-md-4"><div class="btn-rounded btn-rounded-3"></div></div>

        </div>
        <div class="col-md-12" id="quadro-mural-informativo">
            quadro-mural-informativo
        </div>
    </div>
</main>
<?php require_once HTML_DIR . DS . 'footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático-->
</body>
</html>
