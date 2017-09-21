<?php

namespace App\Model\Product;

use App\Model\Product\ProductModel;
use App\Model\Product\ICreationProduct;

/**
 * Description of CreationProduct
 *
 * @author ivana
 */
class CreationProduct implements ICreationProduct {

    private $id;
    private $description;
    private $price;
    private $created_at;
    private $pdo;
    private $table;
    public function __construct(\PDO $pdo) {
        $this->pdo=$pdo;
    }
    /**
     * Configura o produto e salva, retornando o id 
     * @param ProductModel $product
     * @return int ID do produto salvo
     */
    public function save(ProductModel $product) {
        $this->description= $product->getDescription();
        $this->price= $product->getPrice();        
        $this->table= $product->getTable();
        $now = new \DateTime();
        $now->setTimezone(new \DateTimeZone('utc'));
        $this->created_at = $now->format('Y-m-d H:i:s');
        $this->insert();
        return $this->id;
    }
    /**
     * Efetiva a inserção dos dados iniciais do produto no Banco de Dados
     */
    private function insert(){
        $stmt = $this->pdo->prepare("INSERT INTO $this->table (description,price,created_at) VALUES (:description,:price,:created_at)");
        $stmt->bindParam(":description", $this->description, \PDO::PARAM_STR);
        $stmt->bindParam(":price", $this->price, \PDO::PARAM_STR);
        $stmt->bindParam(":created_at", $this->created_at, \PDO::PARAM_STR);
        $stmt->execute();
        $this->id= $this->pdo->lastInsertId();
    }    

}
