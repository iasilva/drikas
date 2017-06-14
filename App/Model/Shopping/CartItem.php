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
    



}
