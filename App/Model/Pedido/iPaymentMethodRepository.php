<?php
/**
 * Created by PhpStorm.
 * User: Ivan Alves da Silva
 * Date: 12/07/2017
 * Time: 21:30
 */

namespace App\Model\Pedido;


abstract class iPaymentMethodRepository
{
    abstract public function getMethods();
    abstract public function getMethodById($id);
}