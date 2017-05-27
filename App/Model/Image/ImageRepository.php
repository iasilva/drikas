<?php

namespace App\Model\Image;

/**
 * Classe responsável pelas consultas no Banco de Dados
 *
 * @author Ivan Alves da Silva
 */
class ImageRepository implements IImageRepository {

    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getImages($product_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM image_product where product_id = :product_id order by is_primary desc");
        $stmt->bindValue(":product_id", $product_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Image\ImageModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPrimaryImage($product_id) {
         $stmt = $this->pdo->prepare("SELECT * FROM image_product where "
                 . "product_id = :product_id and is_primary = 1");
        $stmt->bindValue(":product_id", $product_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Image\ImageModel');
        $stmt->execute();
        return $stmt->fetch();       
    }

}
