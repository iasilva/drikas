<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 05/08/2017
 * Time: 19:51
 */

namespace App\Controller;


use App\Mvc\Controller;

class Frete extends Controller
{
    private $standardFrete=8.00;

    /**
     * @return float
     */
    public function getStandardFrete()
    {
        return $this->standardFrete;
    }


}