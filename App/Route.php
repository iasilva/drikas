<?php

/**
 * verifica a existência de uma variável GET com o nome de <em>page</em>
 * Essa variável define a classe a ser instanciada
 */
$page = isset( $_GET[ 'page' ] ) ? filter_input( INPUT_GET, "page", FILTER_DEFAULT ) : "";
/**
 * verifica a existência de uma variável GET com o nome de <em>action</em>
 * Essa variável define o método ou ação a ser executada
 */
$action = isset( $_GET[ 'action' ] ) ? filter_input( INPUT_GET, "action", FILTER_DEFAULT ) : "index";

/**
 * Roteamento de acordo com as variáveis passadas
 * Aqui eu defino o Controller e o método a ser chamado.
 */
switch ( $page ) {
	/**
	 * Caso a página chamada seja <em>cart</em>.
	 * A classe Cart é repon~ável das ações do carrinho de compra
	 */
	case 'cart':
		$cart = new \App\Controller\Cart( $produtoRep, $cart );
		switch ( $action ) {
			case "index":
				call_user_func_array( array( $cart, $action ), array( $imageRep ) );
				break;
			default:
				call_user_func_array( array( $cart, $action ), array() );
				break;
		}

		break;
		/**
		 * Página product ta vinculado a tudo em relação ao produto
		 */
	case 'product':
		$product = new \App\Controller\Product( $produtoRep );
		/**
		 * A ação principal de produto é exibir todos os produtos a venda e para 
		 * isso precisa na ação index que seja enviado o objeto derepositório de
		 * imagens
		 */
		switch ( $action ) {
			case "index":
				call_user_func_array( array( $product, $action ), array( $imageRep ) );
				break;
			default:
				call_user_func_array( array( $product, $action ), array() );
				break;
		}

		break;
	case 'teste':
		$teste = new \App\Controller\Teste;
		call_user_func_array( array( $teste, $action ), array() );
		break;
	case 'user':
		$user = new \App\Controller\User;
		switch ( $action ) {
			case 'cadastro':
				$est_repository = new \App\Model\Endereco\EstadoRepository( $pdo );
				call_user_func_array( array( $user, $action ), array( $est_repository ) );
				break;

			default:
				call_user_func_array( array( $user, $action ), array() );
				break;
		}
		break;
	case 'endereco':
		$endereco = new \App\Controller\Endereco( $pdo );
		call_user_func_array( array( $endereco, $action ), array() );
		break;
	case 'session':
		$session = new App\Controller\Session( $pdo );
		call_user_func_array( array( $session, $action ), array() );
		break;
	case 'pedido':
		$pedido = new App\Controller\Pedido( $pdo );
		call_user_func_array( array( $pedido, $action ), array() );
		break;


	default:
		$home = new \App\Controller\Home();
		call_user_func_array( array( $home, $action ), array() );
		break;
}