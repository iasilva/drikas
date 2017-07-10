<?php

namespace App\ Controller;
use App\Model\Product\ProductRepository;
use App\Model\Shopping\CartSession;
use App\Model\Shopping\CartItem;
use App\Model\User\UserRepository;
use Thirday\Request\RequestFactory;

use App\ Mvc\ Controller;
class Pedido extends Controller {

	private $pdo;	

	public function __construct( $pdo ) {
		parent::__construct();
		$this->pdo = $pdo;
	}
	
	/**
	* Método responsável pela transformação dos itens do carrinho em um pedido
	*/
	public function index() {		
		//Verifica se trata-se de registro íntegro na sessão
		if($this->hasProductInCart() && $this->isUser()){
				
		}else{
		
		}
		
	}
	
	
	
	/**
	*Verifica se o carrinho está vazio
	*/
	private function hasProductInCart(){
		$cart= new CartSession();
		if(count($cart->getCartItems())<1){
			header('Location: ./');
		}
	}
	/**
	* Confirma a existência do usuário no banco de dados
	*/
	private function isUser(){
		$user= new UserRepository($this->pdo);
		if($user->getUserById($_SESSION['user']['id'])){
			return true;
		}else{
			throw new \Exception("Usuário não registrado na sessão."._CLASS_);
		}
	}

}