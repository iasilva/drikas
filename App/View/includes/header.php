<header class="container-fluid border-botton-rosa" id="principal-header">
    <div class="row menu-float-topo-right">

        <div class="col-md-7">
            <div class="pull-right">
                <form class="form-inline" method="get" action="./?page=search">
                    <div class="form-group">
                        <input class="form-control" name="q" placeholder="Encontrar produto" title="Digite o código do produto ou uma palavra relacionada. cor| categoria | tag | Código">
                        <button class="btn btn-sm"><span class="glyphicon glyphicon-search"></span> </button>
                    </div>
                </form>
            </div>

        </div>


        <div class="col-md-5 " >
            <div class="pull-right">
                <ul class="list-inline">
                    <?php if (isset($_SESSION['user'])): ?>
                        <?php $nome = explode(' ', $_SESSION['user']['name']) ?>
                        <li><a href="./?page=minha-conta"><span class="glyphicon glyphicon-user">
                            </span>&nbsp;&nbsp;<?php echo $nome[0] ?></a></li>
                        <li><a href="./?page=minha-conta&action=MyOrders" title="Ver meus pedidos">Meus pedidos</a></li>
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
            </div>

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
                    <li><a href="./">Página inicial</a></li>
                   <!-- <li><a href="#">Películas</a></li>
                    <li><a href="#">Joinhas</a></li>-->
                    <li><a href="./?page=StaticController&action=parceria">Parcerias</a></li>
                    <!--<li><a href="#">Atacado</a></li>-->
                    <!--<li><a href="#">Ajuda</a></li>-->
                    <li><a href="./?page=StaticController&action=contato">Fale conosco</a></li>
                </ul>

            </div>
        </div>
    <?php endif; ?>
</header><!-- #principal-header -->