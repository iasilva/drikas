<header class="container-fluid border-botton-rosa" id="principal-header">
    <div class="row menu-float-topo-right">
        <div class="pull-right">
            <ul class="list-inline">
                <?php if (isset($_SESSION['user'])): ?>
                    <?php $nome = explode(' ', $_SESSION['user']['name']) ?>
                    <li><span class="glyphicon glyphicon-user">                             
                        </span>&nbsp;&nbsp;<?php echo $nome[0] ?></li>
                    <li><a href="./?page=my&action=requests">Meus pedidos</a></li>
                    <li><a href="./?page=cart" title="Finalizar compra - Ver o carrinho">Finalizar compra</a></li>
                    <li><a href="./?page=cart" title="Finalizar compra - Ver o carrinho"><span
                                    class="glyphicon glyphicon-shopping-cart">
                            </span><span id="item-in-cart" class="badge"></span></a></li>
                    <li><a href="./?page=session&action=logout">Sair</a></li>
                <?php else: ?>
                    <li><a href="./?page=cart" title="Finalizar compra - Ver o carrinho"><span
                                    class="glyphicon glyphicon-shopping-cart">
                            </span><span id="item-in-cart" class="badge"></span></a></li>
                    <li><a href="./?page=user&action=cadastro">Cadastrar</a></li>
                    <li><a href="./?page=user&action=login">Entrar</a></li>
                <?php endif; ?>
            </ul>
            <!--//Nessa linha deve entrar ícones das redes sociais-->
        </div>

    </div>
    <div class="row">
        <h1 class="text-center logo-header"><a href="./">Drika's</a></h1>
    </div>

    <!--Elimina o menu caso esteja processando um pedido-->
    <?php if (!isset($_GET['page']) || ($_GET['page'] !== 'pedido')): ?>
        <div class="row menu">
            <div class="text-center">
                <ul class="list-inline text-primary">
                    <li><a href="#">Películas</a></li>
                    <li><a href="#">Joinhas</a></li>
                    <li><a href="#">Parcerias</a></li>
                    <li><a href="#">Atacado</a></li>
                    <li><a href="#">Ajuda</a></li>
                    <li><a href="#">Fale conosco</a></li>
                </ul>

            </div>
        </div>
    <?php endif; ?>
</header><!-- #principal-header -->