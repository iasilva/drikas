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
        $stmt = $this->pdo->prepare("select drk.order_item.quantity, drk.order_item.quantity_in_cartoon, drk.order_item.price, 
                                      drk.product.description as product, drk.image_product.name as image 
                        FROM drk.order_item inner join drk.product inner join drk.image_product
                        ON drk.order_item.product_id = drk.product.id and drk.product.id = drk.image_product.product_id
                        where drk.order_item.order_id=:order_id order by  drk.order_item.id
        ");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Pedido\ItemFromExibicao');
        $stmt->bindValue(":order_id", $order_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}