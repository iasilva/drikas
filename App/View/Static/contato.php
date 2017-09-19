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
<main class="container-fluid" id="page-contact">

    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Patua+One|Roboto+Condensed:700" rel="stylesheet">

    <section id="contact" class="content-section text-center">
        <div class="contact-section">
            <div class="container">
                <h2>Contate-nos</h2>
                <p>Sinta-se à vontade para nos chamar, através do formulário de contato ou visitando nossas redes sociais, como Facebook,Whatsapp,Twitter.</p>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form class="form-horizontal" id="contact-form">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="form-contact-name" id="form-contact-name" placeholder="Drika Silva">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="form-contact-email" id="form-contact-email" placeholder="drika.silva@exemplo.com">
                            </div>
                            <div class="form-group ">
                                <label for="mensagem">Sua mensagem</label>
                                <textarea  class="form-control" name="form-contact-mensagem" placeholder="Descrição" id="form-contact-mensagem"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Enviar mensagem</button>
                        </form>

                        <hr>
                        <h3>Nossas redes sociais</h3>
                        <ul class="list-inline banner-social-buttons">
                            <li><a href="https://twitter.com/peliculasdrikas" target="_blank" class="btn btn-default btn-lg"><i class="fa fa-twitter"> <span class="network-name">Twitter</span></i></a></li>
                            <li><a href="https://www.facebook.com/peliculasdrikas" target="_blank" class="btn btn-default btn-lg"><i class="fa fa-facebook"> <span class="network-name">Facebook</span></i></a></li>
                            <li><a href="https://www.instagram.com/peliculasdrikas/" target="_blank" class="btn btn-default btn-lg"><i class="fa fa-instagram"> <span class="network-name">Instagram</span></i></a></li>
                        </ul>
                    </div>

                    <div class="col-md-8 col-md-offset-2" id="return-servidor">

                    </div>



                </div>
            </div>
        </div>


    </section>









    <!-- Modal -->
    <div class="modal fade" id="modal-enviando-email" tabindex="-1" role="dialog" aria-labelledby="Carregando">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="./images/layout/enviando-email.gif" class="img-responsive pull-left" alt="Imagem em movimento - Enviando email" style="max-height: 120px;">
                    <h1 style="margin-top: 40px"> Enviando...</h1>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>



















</main>
<?php require_once HTML_DIR . DS . 'footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático-->
<script type="text/javascript" src="./script/contato.js"></script><!--Javascript exclusivo da página de contatos-->
</body>
</html>
