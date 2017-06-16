<?php

namespace App\Model\Shopping;


/**
 * Description of CartItem
 *
 * @author ivana
 */
class CartItem {

    private $product;
    private $quantity;
    private $QuantityInCarton = 10;

    public function __construct(\App\Model\Product\ProductModel $product, $quantity) {
        $this->product = $product;
        $this->quantity = (int) $quantity;
    }
    public function getProduct() {
        return $this->product;
    }

    public function getQuantity() {
        return $this->quantity;
    }
    public function getSubTotal(){
        return $this->quantity * $this->product->getPrice();
    }
    public function setProduct(\App\Model\Product\ProductModel $product){
        $this->product = $product;
    }
    function getQuantityInCarton() {
        return $this->QuantityInCarton;
    }

    function setQuantityInCarton($QuantityInCarton = 10) {
        $this->QuantityInCarton = $QuantityInCarton;
    }


    



}
