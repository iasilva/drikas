<?php
namespace App\Model\Image;
use App\Model\Image\ICleaningImage;

/**
 * Responsável pela exclusão a informação da imagem no banco de dados
 *
 * @author ivana
 */
class CleaningImage implements ICleaningImage {
    private $pdo;
    public function __construct(\PDO $pdo) {
        $this->pdo=$pdo;
    }

    public function delete(ImageModel $image) {
       $table=$image->getTable();
       $stmt = $this->pdo->prepare("DELETE FROM $table WHERE  product_id = :product_id");
        $stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
        $stmt->execute();
    }

}
