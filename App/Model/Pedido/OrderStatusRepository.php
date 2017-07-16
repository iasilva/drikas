<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 12/07/2017
 * Time: 22:01
 */

namespace App\Model\Pedido;
use App\Model\Pedido\iOrderStatusRepository;

class OrderStatusRepository extends iOrderStatusRepository
{
    private $pdo;

    /**
     * OrderStatusRepository constructor.
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    function getAllOrderStatus()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM order_status ORDER BY description ASC");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Pedido\OrderStatusModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getOrderStatusById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM order_status WHERE id=:id");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Pedido\OrderStatusModel');
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}