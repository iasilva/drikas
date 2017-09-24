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
        $stmt = $this->pdo->prepare("SELECT * FROM product WHERE deleted = 0 ORDER BY id DESC");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Product\ProductModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProduct($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM product WHERE id = :id AND deleted = 0");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Product\ProductModel');
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getProductsByCategory($category_id) {
        $stmt = $this->pdo->prepare("SELECT * from product,product_category_product WHERE 
                                                product_category_product.product_category_id =:category_id
                                                and product_category_product.product_id = product.id AND deleted = 0");
        $stmt->bindValue(":category_id", $category_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Product\ProductModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Verificar os produtos relacionados a determinada tagId - Excluindo os produtos marcados como deletados
     * @param $tag_id
     * @return array
     */
    public function getProductsByTag($tag_id) {
        $stmt = $this->pdo->prepare(
            "select product.id,product.description,product.price,product.created_at, product.updated_at
                        from product inner join tag inner join tag_product on tag_product.product_id = product.id and tag_product.tag_id = tag.id
                         where tag.id = :tag_id and product.deleted=0 ORDER BY product.id DESC");
        $stmt->bindValue(":tag_id", $tag_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Product\ProductModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Retorna os produtos pelo nome da tag, excluindo-se os produtos marcados como deletados
     * @param $tag_name
     */
    public function getProductsByTagName($tag_name){
        $stmt=$this->pdo->prepare(
            "select product.id,product.description,product.price,product.created_at, product.updated_at
                        from product inner join tag inner join tag_product on tag_product.product_id = product.id and tag_product.tag_id = tag.id
                         where tag.name = :tag_name and product.deleted=0 ORDER BY product.id DESC"
        );
        $stmt->bindValue(":tag_name", $tag_name, \PDO::PARAM_STR);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Product\ProductModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
