<?php

/*
 * The MIT License
 *
 * Copyright 2017 Ivan Alves da Silva.
 */

namespace App\Controller;

use App\Mvc\Controller;
use App\Model\Product\IProductRepository;
use App\Model\Shopping\ICart;
use App\Model\Shopping\CartItem;
use Thirday\Request\RequestFactory;

/**
 * Description of Cart
 *
 * @author Ivan Alves da Silva
 */
class Cart extends Controller {

    private $product;
    private $cart;

    public function __construct(IProductRepository $product, ICart $cart) {
        parent::__construct();
        $this->product = $product;
        $this->cart = $cart;
    }

    public function index() {
        $this->view->setTitle("Carrinho de compras Drika's");
        $this->view->render('cart');
    }

    /**
     * Recebe as requisições ajax e decide se exclui ou inclui o produto
     */
    public function ajaxUpdateCart() {
        $post = new RequestFactory('post');
        $id = $post->captura('product_id');

        if (!$this->cart->has($id)) {
            $this->add($id);
            echo '1'; /* Retorno necessário exclusivo ao ajax */
        } else {
            $this->delete($id);
            echo '0';
        }
    }

    private function add($id) {
        $product = $this->product->getProduct($id);       
        $item = new CartItem($product, 1);        
        $this->cart->add($item);        
    }

    private function delete($id) {
        $this->cart->delete($id);
    }

}
