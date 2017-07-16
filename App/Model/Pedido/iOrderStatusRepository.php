<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 12/07/2017
 * Time: 21:56
 */

namespace App\Model\Pedido;


abstract class iOrderStatusRepository
{
    abstract function getAllOrderStatus();
    abstract function getOrderStatusById($id);
}