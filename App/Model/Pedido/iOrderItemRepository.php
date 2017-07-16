<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 12/07/2017
 * Time: 22:22
 */

namespace App\Model\Pedido;


abstract class iOrderItemRepository
{
    abstract public function getAllItemsInTheOrder($order_id);
    abstract public function getItemById($id);
}