<?php
/**
 * User: Ivan Alves da Silva
 * Date: 12/07/2017
 * Time: 20:32
 */
include_once HTML_DIR . DS . 'head.php';
include_once HTML_DIR . DS . 'header.php';
?>

<div class="header_page_title"><?php echo $h1 ?> </div>

<main class="container" style="padding-top: 0; margin-top: 0">


    <div class="row">
        <div class="col-md-6"><img src="images\layout\img-woman-bag.png" class="img-responsive" alt=""></div>
        <div class="col-md-6" id="dados_pedido_final_order">
            <p class="frase-check-temp">Por motivo e segurança nós enviaremos o link de pagamento para seu email e/ou celular. Caso  não receba dentro da próxima hora,
                você pode solicitar pelo whatsApp da Drika's, ou através de nosso  <a href="mailto:vendas@peliculasdrikas.com.br">email</a>.</p>
            <p class="whats-temp"><img src="./images/layout/whats-ico-34.png"> <a href="tel:+5527996494935">(27)  9 9649 4935</a></p>
            <div class="blok-links-temp">
                <p><a class="links-temp">Ver informações adicionais sobre pagamentos</a></p>
                <p><a class="links-temp">Ver informações sobre entrega</a></p>
            </div>
            <a href="./" class="btn btn-default">Ir para o início</a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 painel_info_pedido">
            <div class="col-md-12"><span class="label_pedido">Pedido nº: </span><span class="pedido_number"><?php echo $pedido->getId()?></span></div>
            <div class="col-md-4 OK_">OK!</div>
            <div class="col-md-6"><span class="check-temp-frase"> Você acaba de escolher
                produtos de ótima qualidade Drika's. <span class="glyphicon glyphicon-registration-mark" style="font-size: 24px;"></span></span></div>
        </div>
    </div>

</main>





<?php require_once HTML_DIR . DS . 'footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático-->
<script type="text/javascript" src="./script/pedido.js"></script>

<script type="text/javascript" src="./script/plugins/jquery.mask.min.js"></script>
</body>
</html>
