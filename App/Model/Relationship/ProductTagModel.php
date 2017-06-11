<?php

namespace App\Model\Relationship;

use App\Model\Product\IProductRepository;

/**
 * Model do relacionamento Tag Product
 *
 * @author ivana
 */
class ProductTagModel {

    private $tag_id;
    private $product_id;
    private $table = "tag_product";

    /**
     * @var object Product 
     */
    private $product;

    /**
     * @var object tag
     */
    private $tag;
    private $pdo;

    public function __construct() {
        $this->pdo = \Database::conexao();
        $this->product = new \App\Model\Product\ProductRepository($this->pdo);
        $this->tag = new \App\Model\Tag\TagRepository($this->pdo);
    }

    public function getTag_id() {
        return $this->tag_id;
    }

    public function getProduct_id() {
        return $this->product_id;
    }

    /**
     * Seta uma Tag Para o relacionamento- Caso a tag não exista no banco de dados ele lança uma exceção
     * @param int $tag_id
     * @throws \InvalidArgumentException
     */
    public function setTag_id($tag_id) {
        if ($this->tag->getTag($tag_id)) {
            $this->tag_id = $tag_id;
        } else {
            throw new \InvalidArgumentException("Para setar um relacionamento"
            . " é necessário informar um id de tag existente. " . __CLASS__);
        }
    }

    /**
     * Seta um produto para o relacionamento - Verificando se existe tal produto 
     * na tabela Product
     * @param id $product_id
     */
    public function setProduct_id($product_id) {
        if ($this->product->getProduct($product_id)) {
            $this->product_id = $product_id;
        } else {
            throw new \InvalidArgumentException("Para setar um relacionamento"
            . " é necessário informar um id de produto existente. " . __CLASS__);
        }
    }

    /**
     * Salva o objeto no banco de dados
     */
    public function save() {
        if (!$this->exists()) {
            $stmt = $this->pdo->prepare("INSERT INTO $this->table VALUES (?,?)");
            $stmt->execute(array($this->tag_id, $this->product_id));
        }
    }

    /**
     * Deleta a relação
     * @param int $product_id
     * @param int $tag_id
     * @return int Quantidade de linhas afetadas
     */
    public function delete($product_id, $tag_id) {
        $stmt = $this->pdo->prepare("DELETE FROM $this->table WHERE tag_id = :tag_id and product_id = :product_id");
        $stmt->bindParam(":tag_id", $tag_id, \PDO::PARAM_INT);
        $stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
        $count = $stmt->execute();
        return $count;
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
     * Deleta todas as relações de determinada tag
     * @param int $tag_id
     *  @return int Quantidade de linhas afetadas
     */
    public function deleteAllByTag($tag_id) {
        $stmt = $this->pdo->prepare("DELETE FROM $this->table WHERE tag_id = :tag_id");
        $stmt->bindParam(":tag_id", $tag_id, \PDO::PARAM_INT);
        $count = $stmt->execute();
        return $count;
    }
    
    /**
     * Verifica se já existe o relacionamento no banco de dados
     * @return bool
     */
    private function exists() {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE tag_id = "
                . ":tag_id and product_id =:product_id");
        $stmt->bindValue(":tag_id", $this->tag_id, \PDO::PARAM_INT);
        $stmt->bindValue(":product_id", $this->product_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Category\ProductCategoryModel');
        $stmt->execute();
        return $stmt->fetch();
    }

}
