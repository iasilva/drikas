<?php
/**
 * User: Ivan Alves da Silva
 * Date: 12/07/2017
 * Time: 21:38
 */

namespace App\Model\Pedido;


class PaymentMethodRepository extends iPaymentMethodRepository
{
    private $pdo;
    public function __construct(\PDO $pdo)
    {
            $this->pdo=$pdo;
    }

    /**
     * Busca todos os Metodos de pagamentos disponível
     * @return array de objetos com todos os métodos de pagamento disponível
     */
    public function getMethods()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM payment_method ORDER BY description ASC");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Pedido\PaymentMethodModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    /**
     * Busca o método de pagamento pelo id
     * @return object objeto com o método de pagamento buscado
     */
    public function getMethodById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM payment_method WHERE id = :id ORDER BY description ASC");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Pedido\PaymentMethodModel');
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}