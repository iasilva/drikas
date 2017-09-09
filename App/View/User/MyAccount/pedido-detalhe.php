<?php include_once HTML_DIR . DS . 'head.php'; ?>
<?php include_once HTML_DIR . DS . 'header.php'; ?>

<div class="container-fluid barra-top-notice-blue">
    <div class="row">
        <div class="col-xs-12">
            <div class="container">
                <h1>Detalhes do pedido</h1>
            </div>
        </div>
    </div>

</div>
<main class="container" style="margin: 0">
    <!--Incluir um aside col-md-3-->
    <?php
    require_once dirname(__FILE__) . '/aside.php';
    ?>
    <div class="col-md-8 col-md-offset-1">
        <table class="table table-responsive">
            <tr>
                <th></th>
                <th>Produto</th>
                <th>Quant.</th>
                <th>Preço</th>
                <th>Sub Total</th>
            </tr>
            <?php foreach ($itens as $iten):?>
                <tr>
                    <td><img class="img-responsive img-thumbnail img-in-itens-pedido" src="./images/peliculas/<?php echo $iten->getImage()?>" alt="Imagem da <?php echo $iten->getProduct()?>"></td>
                    <td style="max-width: 100px">Cartela de <em><?php echo $iten->getProduct()?></em> com <?php echo $iten->getQuantityInCartoon()?> und. </td>
                    <td  style="max-width: 24px"><?php echo $iten->getQuantity()?></td>
                    <td>R$: <?php echo number_format($iten->getPrice(),2,',','.')?></td>
                    <td>R$: <?php echo number_format($iten->getPrice()*$iten->getQuantity(),2,',','.')?></td>

                </tr>
            <?php endforeach; ?>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Frete:</td>
            <td>R$: <?php echo number_format($order->getFreight(),2,',','.')?></td>
            </tr><tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Produtos:</td>
            <td>R$: <?php echo number_format($order->getTotal(),2,',','.')?></td>
            </tr>
           <td></td>
            <td></td>
            <td></td>
            <td><strong>Total:</strong></td>
            <td><strong><span class="text-success">R$: <?php echo number_format($order->getTotal()+$order->getFreight(),2,',','.')?></span> </strong></td>
        </table>

        <?php ?>



    </div>
</main>
<?php require_once HTML_DIR . DS . 'footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático-->
</body>
</html>
