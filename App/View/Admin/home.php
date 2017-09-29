
<?php include_once HTML_DIR.DS.'admin-head.php'; ?>
<?php include_once HTML_DIR.DS.'admin-header.php'; ?>
<div class="container-fluid barra-top-notice-blue">
    <div class="row">
        <div class="col-xs-12">
            <div class="container">
                <h1> Bem vindo <span style="opacity: .5;"><?php echo $user =(isset($_SESSION['user']))?$_SESSION['user']['name']:''; ?></span>  <span class="glyphicon glyphicon-home" style="font-size: 16px; opacity: .5;"></span> </h1>
            </div>
        </div>
    </div>

</div>

<main class="container">
    <h3 class="text-info">Últimos pedidos</h3>

    <div class="col-md-8 col-md-offset-1">
        <table class="table table-responsive table-bordered" id="table-meus-pedidos">
            <tr>
                <th>Cód.</th>
                <th class="hidden-sm">Usuário</th>
                <th>Data</th>
                <th><strong>Total (com frete) (R$)</strong></th>
                <th></th>
            </tr>
            <?php foreach ($orders as $order): ?><!--Foreach para exibição da tabela de pedidos-->
            <tr>
                <td><?php echo $order->getId(); ?></td>
                <td class="hidden-sm"><?php echo $order->getUserId(); ?></td>
                <td><?php
                    $dataDaCompra= new DateTime($order->getCreatedAt(),new DateTimeZone('America/Sao_Paulo'));
                    echo $dataDaCompra->format("d/m/Y h:i:s")
                    ?></td>
                <td class="text-success"><strong><?php echo number_format($order->getTotal() + $order->getFreight(), 2, ',', '.'); ?></strong></td>
                <td></td>
            </tr>

            <?php endforeach; ?><!--Fianliza a exibição da minha tabela de pedidos-->
        </table>

    </div>
    
</main>
<?php require_once HTML_DIR.DS.'admin-footer.php'; ?> <!--Inclui o FOOTER - ainda básico e estático--> 
</body>
</html>
