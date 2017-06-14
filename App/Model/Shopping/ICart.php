<?php

namespace App\Model\Shopping;

/**
 * Description of iCart
 *
 * @author ivana
 */
abstract class iCart {
    abstract function add(CartItem $item);
    abstract function update(CartItem $item);
    abstract function delete($id);
    abstract function getTotal();
    abstract function getCartItems();
    abstract function has($id);
}
