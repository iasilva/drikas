<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 12/07/2017
 * Time: 22:29
 */

namespace App\Model\Pedido;


class OrderItemRepository extends iOrderItemRepository
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Pega todos os itens do pedido
     * @param $order_id
     * @return array de objetos OrderItemModel
     */
    public function getAllItemsInTheOrder($order_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM order_item WHERE order_id=:order_id ORDER BY description ASC");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Pedido\OrderItemModel');
        $stmt->bindValue(":order_id", $order_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Busca um item específico do carrinho
     * @param $id
     * @return object OrderItemModel
     */
    public function getItemById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM order_item WHERE id=:id");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Pedido\OrderItemModel');
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}