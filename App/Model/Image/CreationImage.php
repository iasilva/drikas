<?php


namespace App\Model\Image;

/**
 * Description of CreationImage
 *
 * @author ivana
 */
class CreationImage extends ICreationImage {
    public function __construct(\PDO $pdo) {
        $this->pdo=$pdo;
    }

        public function save(ImageModel $img) {
        $table= $img->getTable();
        $name=$img->getName();
        $primary=$img->getIs_primary();
        $product_id= $img->getProduct_id();
        return $this->insert($table, $name, $primary, $product_id);
    }
    /**
     * Efetiva a inserção dos dados iniciais da imagem no Banco de Dados
     */
    private function insert($table,$name,$primary,$product_id){
        
        $stmt = $this->pdo->prepare("INSERT INTO $table (name,is_primary,product_id) "
                . "VALUES (:name,:is_primary,:product_id)");
        $stmt->bindParam(":name", $name, \PDO::PARAM_STR);
        $stmt->bindParam(":is_primary", $primary, \PDO::PARAM_STR);
        $stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }    

}
