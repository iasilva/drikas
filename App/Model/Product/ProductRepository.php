<?php

namespace App\Model\Product;

use App\Model\Product\IProductRepository;

/**
 * Classe responsável pela consulta dos produtos no banco de dados
 *
 * @author ivana
 */
class ProductRepository implements IProductRepository {

    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getProducts() {
        $stmt = $this->pdo->prepare("SELECT * FROM product ORDER BY id DESC");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Product\ProductModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProduct($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM product WHERE id = :id");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Product\ProductModel');
        $stmt->execute();
        return $stmt->fetch();
    }

}
