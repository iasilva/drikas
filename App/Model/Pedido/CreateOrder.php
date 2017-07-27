<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 15/07/2017
 * Time: 14:09
 */

namespace App\Model\Pedido;


class CreateOrder
{
    private $pdo;

    private $table;

    /**
     * CreateOrder constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param OrderModel $order
     * @return int ID - do pedido inserido
     */
    public function save(OrderModel $order)
    {
        $this->table = $order->getTable();
        $user_id = $order->getUserId();
        $qtd = $order->getQtd();
        $payment_method_id = $order->getPaymentMethodId();
        $order_status_id = $order->getOrderStatusId();
        $freight = $order->getFreight();
        $total = $order->getTotal();
        $now = new \DateTime();
        $now->setTimezone(new \DateTimeZone('utc'));
        $created_at = $now->format('Y-m-d H:i:s');
        return $this->insert($user_id, $qtd,$payment_method_id, $order_status_id, $freight, $total, $created_at);

    }

    /**
     * Realiza o insert no Banco de dados efetivamente
     * @param $user_id
     * @param $qtd
     * @param $payment_method_id
     * @param $order_status_id
     * @param $freight
     * @param $total
     * @param $created_at
     * @return int - Id do pedido
     */
    private function insert($user_id, $qtd, $payment_method_id, $order_status_id, $freight, $total, $created_at)
    {
        $stmt = $this->pdo->prepare("INSERT INTO $this->table (
        user_id,
        qtd,       
        payment_method_id,
        order_status_id, 
        freight, 
        total, 
        created_at
    ) VALUES (
        :user_id,
        :qtd,       
        :payment_method_id,
        :order_status_id, 
        :freight, 
        :total, 
        :created_at
    )");
        $stmt->bindParam(":user_id", $user_id, \PDO::PARAM_INT);
        $stmt->bindParam(":qtd", $qtd, \PDO::PARAM_INT);
        $stmt->bindParam(":payment_method_id",$payment_method_id, \PDO::PARAM_INT);
        $stmt->bindParam(":order_status_id",$order_status_id, \PDO::PARAM_INT);
        $stmt->bindParam(":freight", $freight, \PDO::PARAM_STR);
        $stmt->bindParam(":total", $total, \PDO::PARAM_STR);
        $stmt->bindParam(":created_at", $created_at, \PDO::PARAM_STR);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }


}