<?php include_once dirname(__FILE__) . '/includes/head.php'; ?>
<?php include_once dirname(__FILE__) . '/includes/header.php'; ?>
<!--Linha acima é necessária em todas as views para inclusão de qualquer include-->
<main class="container">
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
                <tr>
                    <td data-th="Produto">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="http://localhost/drikas/images/peliculas/591e2d807c3b5.png" alt="..." class="img-responsive"/></div>
                            <div class="col-sm-10">
                                <h4 class="nomargin">Product 1</h4>
                                <!--<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>-->
                            </div>
                        </div>
                    </td>
                    <td data-th="cartela">
                        <select>
                            <option>2 und.</option>
                            <option>4 und.</option>
                            <option>10 und.</option>
                        </select>
                    </td>
                    <td data-th="Preço">$1.99</td>
                    <td data-th="Quantidade">
                        <input type="number" class="form-control text-center" value="1">
                    </td>
                    <td data-th="Subtotal" class="text-center">1.99</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm" title="Atualizar Carrinho"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm" title="Excluir item do carrinho"><i class="fa fa-trash-o"></i></button>								
                    </td>
                </tr>
                
                <tr>
                    <td data-th="Produto">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="http://localhost/drikas/images/peliculas/591712f3378e8.png" alt="..." class="img-responsive"/></div>
                            <div class="col-sm-10">
                                <h4 class="nomargin">Product 2</h4>
                                <!--<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>-->
                            </div>
                        </div>
                    </td>
                    <td data-th="cartela">
                        <select>
                            <option>2 und.</option>
                            <option>4 und.</option>
                            <option>10 und.</option>
                        </select>
                    </td>
                    <td data-th="Preço">$1.99</td>
                    <td data-th="Quantidade">
                        <input type="number" class="form-control text-center" value="1">
                    </td>
                    <td data-th="Subtotal" class="text-center">1.99</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm" title="Atualizar Carrinho"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm" title="Excluir item do carrinho"><i class="fa fa-trash-o"></i></button>								
                    </td>
                </tr>
                
                
                
                
            </tbody>
            
            <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Total 1.99</strong></td>
                </tr>
                <tr>
                    <td><a href="./" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Comprando</a></td>
                    <td colspan="3" class="hidden-xs"></td>
                    
                    <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                    <td><a href="#" class="btn btn-success btn-block" >Checkout <i class="fa fa-angle-right"></i></a></td>
                </tr>
            </tfoot>
        </table>


</main>
<?php include_once dirname(__FILE__) . '/includes/footer.php'; ?>
</body>
</html>
