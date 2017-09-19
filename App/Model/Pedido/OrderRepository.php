<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 15/07/2017
 * Time: 13:44
 */

namespace App\Model\Pedido;


class OrderRepository extends iOrderRepository
{
    private $pdo;

    /**
     * OrderRepository constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * Consulta um determinado pedido específico
     * @param $id
     */
    public function getOrder($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM saind604_drk.order WHERE id = :id");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Pedido\OrderModel');
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Relaciona todos os pedidos de um determinado usuário
     * @param $user_id
     */
    public function getOrders($user_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM saind604_drk.order WHERE user_id = :user_id ORDER BY id DESC");
        $stmt->bindValue(":user_id", $user_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Pedido\OrderModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Relaciona todos os períodos dentro de um determinado período.
     * @param \DateTime $inicio Demarca a data de início do período desejado
     * @param \DateTime $fim  Demarca a data final do período desejado
     * @param string $user - Opcional- especifica se é referente a pedidos de um usuário específico
     */
    public function getOrdersByPeriod(\DateTime $inicio, \DateTime $fim, $user = '')
    {
        // TODO: Implement getOrdersByPeriod() method.
    }
}