<?php include_once HTML_DIR . DS . 'head.php'; ?>
<?php include_once HTML_DIR . DS . 'header.php'; ?>

<div class="container-fluid barra-top-notice-blue">
    <div class="row">
        <div class="col-xs-12">
            <div class="container">
                <h1>Meus pedidos</h1>
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
        <table class="table table-responsive table-bordered" id="table-meus-pedidos">
            <tr>
                <th>Cód.</th>
                <th class="hidden-sm">Status</th>
                <th>Data</th>
                <th><strong>Total (R$)</strong></th>
                <th></th>
            </tr>
            <?php foreach ($myOrders as $myOrder): ?><!--Foreach para exibição da tabela de pedidos-->
            <tr>
                <td><?php echo $myOrder->getId(); ?></td>
                <td class="hidden-sm"><?php echo "Unavailable"; ?></td>
                <td><?php
                    $dataDaCompra= new DateTime($myOrder->getCreatedAt(),new DateTimeZone('America/Sao_Paulo'));
                    echo $dataDaCompra->format("d/m/Y")
                    ?></td>
                <td class="text-success"><strong><?php echo number_format($myOrder->getTotal() + $myOrder->getFreight(), 2, ',', '.'); ?></strong></td>
                <td><a href="./?page=minha-conta&action=orderDetail&orderId=<?php echo $myOrder->getId();?>">Ver detalhes</a></td>
            </tr>

            <?php endforeach; ?><!--Fianliza a exibição da minha tabela de pedidos-->
        </table>

    </div>
</main>
<?php require_once HTML_DIR . DS . 'footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático-->
</body>
</html>
