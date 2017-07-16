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
        // TODO: Implement getOrder() method.
    }

    /**
     * Relaciona todos os pedidos de um determinado usuário
     * @param $user_id
     */
    public function getOrders($user_id)
    {
        // TODO: Implement getOrders() method.
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