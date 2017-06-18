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
    private $images;
    private $items;
    
    private $pricePelicula= array(2=>0.99,4=>1.79,10=>2.49);

    public function __construct(IProductRepository $product, ICart $cart) {
        parent::__construct();
        $this->product = $product;

        $this->cart = $cart;
    }

    public function index(\App\Model\Image\IImageRepository $images) {
        $this->images = $images;
        $this->items = $this->cart->getCartItems();
        $this->configProductWithPrimaryImage($images);
        $this->view->set('products', $this->items);
        $this->view->set('total', $this->cart->getTotal());
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
            $this->ajaxDelete($id);
            echo '0';
        }
    }

    private function add($id) {
        $product = $this->product->getProduct($id);
        $item = new CartItem($product, 1);
        $this->cart->add($item);
    }
    /**
     * Ação para deleção interna
     * Quem decide se usa ou não é o método ajaxUpdateCart()
     * @param type $id
     */
    private function ajaxDelete($id) {
        $this->cart->delete($id);
    }
    /**
     * Ação para deleção externa
     * @param type $id
     */
    public function delete() {
        $get= new RequestFactory('get');
        $this->cart->delete($get->captura('id'));
        header("location: ./?page=cart");
    }

    /**
     * 
     * @return String através de echo para alimentar ajax
     */
    public function ajaxCountItens() {
        echo count($this->cart->getCartItems());
    }

    public function has() {
        $post = new RequestFactory('post');
        $id = $post->captura('product_id');
        if ($this->cart->has($id)) {
            echo '1';
        } else {
            echo '0';
        }
    }
    
    /**
     * As atualizações que são feitas no carrinho seja pela quantidade de películas 
     * na cartela ou a quantidade de cartelas são encaminhadas a esse método
     */
    public function ajaxUpdateItemInTheCart() {
        $post = new RequestFactory('post');        
        $product = $this->product->getProduct($post->captura('product_id'));
        $product->setPrice($this->pricePelicula[$post->captura('qtdNaCartela')]);        
        $item = new CartItem($product,$post->captura('quantidadeAtualDeCartelas'));
        $item->setQuantityInCarton($post->captura('qtdNaCartela'));         
        $this->cart->update($item);       
    }

    /**
     * Configura todos os produtos com suas todas imasgens vinculadas 
     * @param IImageRepository $images
     */
    private function configProductWithPrimaryImage() {
        foreach ($this->items as $key => $item) {
            $image = $this->images->getPrimaryImage($key);
            $produto = $item->getProduct();
            $produto->setImages($image);
        }
    }

}
