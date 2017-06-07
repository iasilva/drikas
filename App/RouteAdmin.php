<?php

/**
 * verifica a existência de uma variável GET com o nome de <em>page</em>
 * Essa variável define a classe a ser instanciada
 */
$page = isset($_GET['page']) ? filter_input(INPUT_GET, "page", FILTER_DEFAULT) : "";
/**
 * verifica a existência de uma variável GET com o nome de <em>action</em>
 * Essa variável define o método ou ação a ser executada
 */
$action = isset($_GET['action']) ? filter_input(INPUT_GET, "action", FILTER_DEFAULT) : "admin";
/**
 * Quando é passado alguma categoria via url
 */
$cat = isset($_GET['cat']) ? filter_input(INPUT_GET, "cat", FILTER_VALIDATE_INT) : 2;

/**
 * Repositório de categorias
 */
$catRepos = new \App\Model\Category\ProductCategoryRepository($pdo);


/**
 * Roteamento de acordo com as variáveis passadas
 * Aqui eu defino o Controller e o método a ser chamado.
 */
switch ($page) {

    /**
     * Página product ta vinculado a tudo em relação ao produto
     */
    case 'product':
        $product = new \App\Controller\Product($produtoRep);

        /**
         * A ação principal de produto é exibir todos os produtos a venda e para 
         * isso precisa na ação index que seja enviado o objeto derepositório de
         * imagens
         */
        switch ($action) {
            case "cadastrar":
                call_user_func_array(array($product, $action), array($catRepos, $cat));
                break;
            case "insert":
                call_user_func_array(array($product, $action), array($pdo));
                break;
            default:
                call_user_func_array(array($product, $action), array());
                break;
        }

        break;
    case 'teste':
        $teste= new \App\Controller\Teste;
        call_user_func_array(array($teste, $action), array());

        break;




    default:
        $home = new \App\Controller\Home();
        call_user_func_array(array($home, $action), array());
        break;
}