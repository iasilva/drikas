<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 12/07/2017
 * Time: 21:53
 */

namespace App\Model\Pedido;


class OrderStatusModel
{
    private $id;
    private $description;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}