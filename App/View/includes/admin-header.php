<?php
$cat = new \App\Model\Category\ProductCategoryRepository(\Database::conexao());
$categoriasPrincipais = $cat->getCategories();
?>

<header class="container-fluid border-botton-rosa" id="principal-header">
    <div class="row menu-float-topo-right">
        <div class="pull-right" >
            <ul class="list-inline">
               <li style="opacity: .6"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user']['name']; ?></li>
            </ul>
            <!--//Nessa linha deve entrar ícones das redes sociais--> 
        </div>


    </div>
    <div class="row">
        <a href="./"><h1 class="text-center ">Drika's <small><span class="text-muted">Admin</span></small></h1></a>    
    </div>
    <div class="container">
        <div class="row menu" style="padding-bottom: 12px;">

            <div class="barra"> <ul class="nav nav-tabs">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">Cadastrar <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php foreach ($categoriasPrincipais as $categoria) { ?>
                                <li><a href="./?page=product&action=cadastrar&cat=<?php echo $categoria->getId() ?>"><?php echo $categoria->getName() ?></a></li>                                 
                            <?php } ?>   

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">Atualizar <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php foreach ($categoriasPrincipais as $categoria) { ?>
                                <li><a href="./?page=product&action=atualizar&cat=<?php echo $categoria->getId() ?>"><?php echo $categoria->getName() ?></a></li>                                 
                            <?php } ?>   
                        </ul>
                    </li>

                </ul>
            </div>


        </div>

    </div>


</header><!-- #principal-header -->