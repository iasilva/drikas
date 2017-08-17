<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 05/08/2017
 * Time: 19:51
 */

namespace App\Controller;


use App\Mvc\Controller;
use App\Model\Shopping\CartSession;

class Frete extends Controller
{
    private $standardFrete=8.00;


    public function __construct()
    {
        $cart= CartSession::getCart();
        if($cart->getTotal() > 49.99){
            $this->standardFrete=0;
        }else{
            $this->standardFrete=8.00;
        }
    }


    /**
     * @return float
     */
    public function getStandardFrete()
    {
        return $this->standardFrete;
    }


}