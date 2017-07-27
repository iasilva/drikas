<?php
/**
 * Created by PhpStorm.
 * User: Ivan Alves da Silva
 * Date: 12/07/2017
 * Time: 22:09
 */

namespace App\Model\Pedido;


class OrderItemModel
{
    private $id;
    private $quantity;
    private $price;
    private $quantity_in_cartoon;
    private $product_id;
    private $order_id;
    private $table = 'order_item';

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }


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
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getQuantityInCartoon()
    {
        return $this->quantity_in_cartoon;
    }

    /**
     * @param mixed $quantity_in_cartoon
     */
    public function setQuantityInCartoon($quantity_in_cartoon)
    {
        $this->quantity_in_cartoon = $quantity_in_cartoon;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    public function save(\PDO $pdo)
    {
        $createItem= new CreateOrderItem($pdo);
        $createItem->save($this);

    }


}