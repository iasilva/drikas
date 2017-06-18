<?php include_once dirname(__FILE__) . '/includes/head.php'; ?>
<?php include_once dirname(__FILE__) . '/includes/header.php'; ?>
<!--Linha acima é necessária em todas as views para inclusão de qualquer include-->
<main class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3>Carrinho de compras</h3>

            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:45%">Produto</th>
                        <th style="width:9%">Cartela</th>
                        <th style="width:10%">Preço</th>
                        <th style="width:8%">Quantidade</th>
                        <th style="width:18%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($products as $item): ?> 

                        <tr>
                            <td data-th="Produto">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs">
                                        <img src="./images/peliculas/<?php echo $item->getProduct()->getImages()->getName(); ?>" 
                                             alt="Imagem da película código <?php echo $item->getProduct()->getId(); ?> da Drika's" class="img-responsive"/></div>
                                    <div class="col-sm-10">
                                        <h4 class="nomargin" class="cart-description"><?php echo $item->getProduct()->getDescription(); ?></h4>                                
                                    </div>
                                </div>
                            </td>
                            <td data-th="cartela">
                                <select name="cart-und" class="cart-und">
                                    <?php $qtd = $item->getQuantityInCarton() ?>
                                    <option value="2" <?php echo $check = ($qtd == 2) ? "selected" : '' ?>>2 und.</option>
                                    <option value="4"<?php echo $check = ($qtd == 4) ? "selected" : '' ?>>4 und.</option>
                                    <option value="10" <?php echo $check = ($qtd == 10) ? "selected" : '' ?>>10 und.</option>
                                </select>
                            </td>
                            <td data-th="Preço" class="cart-price"><?php echo "R$ " . number_format($item->getProduct()->getPrice(), 2, ',', '.'); ?></td>
                            <td data-th="Quantidade">
                                <input type="number" name="cart-quantity" class="form-control text-center cart-quantity" min="0" value="<?php echo $item->getQuantity(); ?>">
                            </td>
                            <td data-th="Subtotal" class="text-center cart-subtotal"><?php echo "R$ " . number_format($item->getSubTotal(), 2, ',', '.'); ?></td>
                            <td class="actions" data-th="">
                                <button class="btn btn-info btn-sm btn-update-item" title="Atualizar Carrinho"><i class="fa fa-refresh"></i></button>
                                <a href="./?page=cart&action=delete&id=<?php echo $item->getProduct()->getId(); ?>"><button class="btn btn-danger btn-sm btn-delete-item" title="Excluir item do carrinho"><i class="fa fa-trash-o"></i></button></a>	

                            </td>
                    <input type="hidden" name="product_id" value="<?php echo $item->getProduct()->getId(); ?>">  
                    </tr>
                <?php endforeach; ?>




                </tbody>

                <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong><?php echo "R$ " . number_format($total, 2, ',', '.'); ?></strong></td>
                    </tr>
                    <tr>
                        <td><a href="./?page=product" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Comprando</a></td>
                        <td colspan="3" class="hidden-xs"></td>

                        <td class="hidden-xs text-center"><strong><?php echo "R$ " . number_format($total, 2, ',', '.'); ?> </strong></td>
                        <td><a href="#" class="btn btn-success btn-block" >Checkout <i class="fa fa-angle-right"></i></a></td>
                    </tr>
                </tfoot>
            </table>
        </div>



    </div>
</main>
<?php include_once dirname(__FILE__) . '/includes/footer.php'; ?>
</body>
</html>
