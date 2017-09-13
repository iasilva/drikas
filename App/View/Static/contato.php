<?php include_once HTML_DIR . DS . 'head.php'; ?>
<?php include_once HTML_DIR . DS . 'header.php'; ?>
<div class="container-fluid barra-top-notice-blue">
    <div class="row">
        <div class="col-xs-12">
            <div class="container">
                <h1>Fale com a Drika's</h1>
            </div>
        </div>
    </div>

</div>
<main class="container">
    <article class="col-md-6" id="block-contact">
        <form class="form-horizontal">
            <div class="form-group col-md-8">
                <label for="nome">Nome:</label>
                <input class="form-control" name="nome" id="nome" type="text" required>
            </div>
            <div class="form-group col-md-8">
                <label for="email">Email:</label>
                <input class="form-control" name="email" id="email" type="email" required>
            </div>
            <div class="form-group col-md-8">
                <label for="assunto">Assunto:</label>
                <input class="form-control" name="assunto" id="assunto" type="text" required>
            </div>
            <div class="form-group col-sm-12">
                <label for="mensagem">Mensagem</label>
                <textarea rows="7" class="form-control" name="mensagem" id="mensagem" required></textarea>
            </div>

            <div class="form-group col-md-2 col-md-offset-10">
                <input class="btn btn-default" type="submit" value="Enviar mensagem">
            </div>


        </form>

    </article>
<article class="col-md-6">


</article>


</main>
<?php require_once HTML_DIR . DS . 'footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático-->
</body>
</html>
