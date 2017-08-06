<?php
/**
 * Created by PhpStorm.
 * User: Ivan Alves da Silva
 * Date: 14/07/2017
 * Time: 19:09
 */

namespace App\Model\Pedido;



class OrderModel
{
    private $id;
    private $user_id;
    private $qtd;

    private $payment_method_id;
    private $order_status_id;
    /**
     * @var String- Link para impressão do boleto ou pagamento via transferência online
     */
    private $payment_link;
    private $freight;
    private $total;
    private $created_at;
    private $updated_at;
    /**
     * @var String - Retorno que identifica uma transação no pagSeguro
     */
    private $code_transaction_in_pagseguro;
    private $table = 'order';

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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getQtd()
    {
        return $this->qtd;
    }

    /**
     * @param mixed $qtd
     */
    public function setQtd($qtd)
    {
        $this->qtd = $qtd;
    }


    /**
     * @return mixed
     */
    public function getPaymentMethodId()
    {
        return $this->payment_method_id;
    }

    /**
     * @param mixed $payment_method_id
     */
    public function setPaymentMethodId($payment_method_id)
    {
        $this->payment_method_id = $payment_method_id;
    }

    /**
     * @return mixed
     */
    public function getOrderStatusId()
    {
        return $this->order_status_id;
    }

    /**
     * @param mixed $order_status_id
     */
    public function setOrderStatusId($order_status_id)
    {
        $this->order_status_id = $order_status_id;
    }

    /**
     * @return mixed
     */
    public function getFreight()
    {
        return $this->freight;
    }

    /**
     * @param mixed $freight
     */
    public function setFreight($freight)
    {
        $this->freight = $freight;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return String
     */
    public function getPaymentLink()
    {
        return $this->payment_link;
    }

    /**
     * @param String $payment_link
     */
    public function setPaymentLink($payment_link)
    {
        $this->payment_link = $payment_link;
    }

    /**
     * @return String
     */
    public function getCodeTransactionInPagseguro()
    {
        return $this->code_transaction_in_pagseguro;
    }

    /**
     * @param String $code_transaction_in_pagseguro
     */
    public function setCodeTransactionInPagseguro($code_transaction_in_pagseguro)
    {
        $this->code_transaction_in_pagseguro = $code_transaction_in_pagseguro;
    }


    /**
     * Efetua o salvamento do objeto após o preenchimento dos campos
     * @param \PDO $pdo
     */
    public function save(\PDO $pdo){
        $create= new CreateOrder($pdo);
       return $create->save($this);
    }


}