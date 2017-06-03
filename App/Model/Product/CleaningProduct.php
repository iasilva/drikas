<?php

namespace App\Model\Product;

use App\Model\Product\ProductModel;

/**
 * Description of CleaningProduct
 *
 * @author ivana
 */
class CleaningProduct implements ICleaningProduct {

    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    /**
     * Limpa o produto e seus relacionamento do Banco de Dados
     * /////FALTA Cuidar da eliminação das imagens/////
     * @param array $tables
     * @param int $product_id
     */
    public function cleanIt(array $tables, $product_id) {     
        foreach ($tables as $table) {
            $stmt = $this->pdo->prepare("DELETE FROM $table WHERE  product_id = :product_id");
            $stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
            $stmt->execute();
        }
        $this->clean($product_id);
    }
    /**
     * Realiza a exclusão efetiva (limpeza) do produto no banco de dados
     * @param int $product_id
     */
    private function clean($product_id) {        
        $stmt = $this->pdo->prepare("DELETE FROM product WHERE  product_id = :product_id");
        $stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
        $stmt->execute();
    }
    /**
     * Seta determinado produto como deletado
     * @param ProductModel $product
     */
    public function delete(ProductModel $product) {
        $product_id= $product->getId();
        $stmt = $this->pdo->prepare("UPDATE product SET deleted = 1 WHERE  id = :product_id");
        $stmt->bindParam(":product_id",$product_id, \PDO::PARAM_INT);
        $stmt->execute();        
    }

}
