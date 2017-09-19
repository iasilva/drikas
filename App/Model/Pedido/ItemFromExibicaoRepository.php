<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 06/09/2017
 * Time: 18:27
 */

namespace App\Model\Pedido;


class ItemFromExibicaoRepository
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getItensFromOrder($order_id)
    {
        $stmt = $this->pdo->prepare("select saind604_drk.order_item.quantity, saind604_drk.order_item.quantity_in_cartoon, saind604_drk.order_item.price, 
                                      saind604_drk.product.description as product, saind604_drk.image_product.name as image 
                        FROM saind604_drk.order_item inner join saind604_drk.product inner join saind604_drk.image_product
                        ON saind604_drk.order_item.product_id = saind604_drk.product.id and saind604_drk.product.id = saind604_drk.image_product.product_id
                        where saind604_drk.order_item.order_id=:order_id order by  saind604_drk.order_item.id
        ");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Pedido\ItemFromExibicao');
        $stmt->bindValue(":order_id", $order_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}