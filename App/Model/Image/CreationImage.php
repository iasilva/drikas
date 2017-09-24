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
        $now = new \DateTime();
        $now->setTimezone(new \DateTimeZone('utc'));
        $created_at = $now->format('Y-m-d H:i:s');

        return $this->insert($table, $name, $primary, $product_id,$created_at);
    }
    /**
     * Efetiva a inserção dos dados iniciais da imagem no Banco de Dados
     */
    private function insert($table,$name,$primary,$product_id,$created_at){
        
        $stmt = $this->pdo->prepare("INSERT INTO $table (name,is_primary,product_id,created_at) "
                . "VALUES (:name,:is_primary,:product_id,:created_at)");
        $stmt->bindParam(":name", $name, \PDO::PARAM_STR);
        $stmt->bindParam(":is_primary", $primary, \PDO::PARAM_STR);
        $stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
        $stmt->bindParam(":created_at", $created_at, \PDO::PARAM_STR);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }    

}
