<?php

namespace App\Model\Relationship;

/**
 * Description of ProductCategoryModel
 *
 * @author ivana
 */
class ProductCategoryProductModel {

    private $table = "product_category_product";
    private $product_id;
    private $product_category_id;
    private $product;
    private $category;

    public function __construct() {
        $this->pdo = \Database::conexao();
        $this->product = new \App\Model\Product\ProductRepository($this->pdo);
        $this->category = new \App\Model\Category\ProductCategoryRepository($this->pdo);
    }

    public function getProduct_id() {
        return $this->product_id;
    }

    public function getProduct_category_id() {
        return $this->product_category_id;
    }

    public function setProduct_id($product_id) {
        if ($this->product->getProduct($product_id)) {
            $this->product_id = $product_id;
        } else {
            throw new \InvalidArgumentException("Para setar um relacionamento"
            . " é necessário informar um id de produto existente. " . __CLASS__);
        }
    }

    public function setCategory_id($category_id) {
        if ($this->category->getCategory($category_id)) {
            $this->product_category_id = $category_id;
        } else {
            throw new \InvalidArgumentException("Para setar um relacionamento"
            . " é necessário informar um id de categoria existente. " . __CLASS__);
        }
    }

    public function save() {
        if (!$this->exist()) {
            $stmt = $this->pdo->prepare("INSERT INTO $this->table (product_category_id,product_id)"
                    . " VALUES (:category_id,:product_id)");
            $stmt->bindValue(":category_id", $this->product_category_id, \PDO::PARAM_INT);
            $stmt->bindValue(":product_id", $this->product_id, \PDO::PARAM_INT);
            $stmt->execute();
        } else {
            throw new \Exception('Relacionamento já existe. '.__CLASS__, E_USER_NOTICE);
              
        }
    }
    /**
     * Verifica a existencia do relacionamento
     * @return Boolean
     */
    private function exist() {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE "
                . "product_category_id= :cat_id and product_id= :prod_id ");
        $stmt->bindValue(":cat_id", $this->product_category_id, \PDO::PARAM_INT);
        $stmt->bindValue(":prod_id", $this->product_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    /**
     * Deleta todas as relações de determinado produto
     * Útil quando se vai excluir um produto no BD
     * @param int $product_id
     *  @return int Quantidade de linhas afetadas
     */
    public function deleteAllByProduct($product_id) {
        $stmt = $this->pdo->prepare("DELETE FROM $this->table WHERE  product_id = :product_id");
        $stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
        $count = $stmt->execute();
        return $count;
    }
    /**
     * Deleta todas as relações de determinado categoria
     * Útil quando se vai excluir uma categoria no BD
     * @param int $category_id
     *  @return int Quantidade de linhas afetadas
     */
    public function deleteAllByCategory($category_id) {
        $stmt = $this->pdo->prepare("DELETE FROM $this->table WHERE  product_category_id = :product_category_id");
        $stmt->bindParam(":product_category_id", $category_id, \PDO::PARAM_INT);
        $count = $stmt->execute();
        return $count;
    }

}
