<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 15/07/2017
 * Time: 14:09
 */

namespace App\Model\Pedido;


class CreateOrderItem
{
    private $pdo;

    private $table;

    /**
     * CreateOrderItem constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param OrderItemModel $item
     * @return int ID - do item inserido
     */
    public function save(OrderItemModel $item)
    {
        $this->table = $item->getTable();
        $quantity = $item->getQuantity();
        $price = $item->getPrice();
        $qtd_cart = $item->getQuantityInCartoon();
        $product_id = $item->getProductId();
        $order_id = $item->getOrderId();
        $this->insert($quantity, $price, $qtd_cart, $product_id, $order_id);
    }


    /**
     * Efetiva a inserção dos dados no banco de dados
     * @param $quantity
     * @param $price
     * @param $quantity_in_cartoon
     * @param $product_id
     * @param $order_id
     * @return int - Id do item inserido
     */
    private function insert($quantity, $price, $quantity_in_cartoon, $product_id, $order_id)
    {
        $stmt = $this->pdo->prepare("INSERT INTO $this->table (
        quantity,
        price,
        quantity_in_cartoon,
        product_id, 
        order_id
    ) VALUES (
        :quantity,
        :price,
        :quantity_in_cartoon,
        :product_id, 
        :order_id
    )");
        $stmt->bindParam(":quantity", $quantity, \PDO::PARAM_INT);
        $stmt->bindParam(":quantity_in_cartoon", $quantity_in_cartoon, \PDO::PARAM_INT);
        $stmt->bindParam(":price", $price, \PDO::PARAM_STR);
        $stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
        $stmt->bindParam(":order_id", $order_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }


}