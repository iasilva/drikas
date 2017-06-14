<?php

namespace App\Model\Shopping;

/**
 * Description of CartSession
 *
 * @author ivana
 */
class CartSession extends ICart {

    private $items = [];

    public function __construct() {
        $this->restore();        
    }

    private function restore() {
        $this->items= isset($_SESSION['cart']) ? unserialize($_SESSION['cart']) : array();
    }

    public function add(CartItem $item) {
        $id = $item->getProduct()->getId();
        if (!$this->has($id)) {
            $this->items[$id] = $item;
        }
    }

    public function delete($id) {
        if ($this->has($id)) {
            unset($this->items[$id]);
        }
    }

    public function update(CartItem $item) {
        $id = $item->getProduct()->getId();
        if ($this->has($id)) {
            if (!$this->items->getQuantity()) {
                $this->delete($id);
                return;
            }
            $this->items[$id] = $item;
        }
    }

    public function has($id) {
        return isset($this->items[$id]);
    }

    public function getCartItems() {
        return $this->items;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getSubTotal();
        }
        return $total;
    }

    public function __destruct() {
        $_SESSION['cart'] = serialize($this->items);       
    }

}
