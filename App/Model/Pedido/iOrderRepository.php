<?php
/**
 * Created by PhpStorm.
 * User: Ivan Alves da Silva
 * Date: 15/07/2017
 * Time: 13:35
 */

namespace App\Model\Pedido;


abstract class iOrderRepository
{
abstract function getOrder($id);
abstract function getOrders($user_id);
abstract function getOrdersByPeriod(\DateTime $inicio, \DateTime $fim, $user='');
}