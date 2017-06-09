<?php

namespace App\Model\Image;
use App\Model\Image\CreationImage;

/**
 * Description of ImageModel
 *
 * @author ivana
 */
class ImageModel {

    private $id;
    private $name;
    private $is_primary;
    private $created_at;
    private $updated_at;
    private $product_id;
    private $table="image_product";
    private $PermittedExtensions = array('jpg', 'jpeg', 'png');

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
    public function getTable() {
        return $this->table;
    }
    public function getIs_primary() {
        return $this->is_primary;
    }

    public function getCreated_at() {
        return $this->created_at;
    }

    public function getUpdated_at() {
        return $this->updated_at;
    }

    public function getProduct_id() {
        return $this->product_id;
    }
    public function save(\PDO $pdo){
        $img= new CreationImage($pdo);
        $img->save($this);
    }

    public function setId($id) {
        if (!is_int($id)) {
            throw new \InvalidArgumentException("Id precisa ser um número inteiro");
        } else {
            $this->id = $id;
        }
    }

    /**
     * Método seta o nome da imagem, porém ele verifica se o nome está no padrão 
     * correto e se a extensão após o ponto é uma das permitidas.
     * @param string $name - Nome do arquivo
     * @throws \InvalidArgumentException
     */
    public function setName($name) {
        $nome = explode('.', $name);
        if (isset($nome[1]) && in_array($nome[1], $this->PermittedExtensions)) {
            $this->name = $name;
        } else {
            throw new \InvalidArgumentException('O nome ou a extensão da imagem não é válido');
        }
    }

    /**
     * 
     * @param int $primary -1 para imagem principal e 0 para imagem adicional
     * @throws \InvalidArgumentException
     */
    public function setIs_Primary($is_primary) {
        if (!is_int($is_primary)) {
            throw new \InvalidArgumentException("Valor 1 ou 0 para definir se a imagem é principal");
        } else {
            if (($is_primary) !== 1) {
                $this->is_primary = 0;
            } else {
                $this->is_primary = $is_primary;
            }
        }
    }

    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    public function setUpdated_at($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function setProduct_id($product_id) {
        $product = new \App\Model\Product\ProductRepository(\Database::conexao());
        if ($product->getProduct($product_id)) {
            if (!is_int($product_id)) {                
                throw new \InvalidArgumentException("Id precisa ser um número inteiro");
            } else {
                $this->product_id = $product_id;
            }
        }else{
             throw new \InvalidArgumentException("Id precisa ser de um produto cadastrado");
        }
            
    }
     public function deleteAllByProduct($product_id) {
        $pdo= \Database::conexao();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("DELETE FROM $this->table WHERE  product_id = :product_id");
        $stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
        $count = $stmt->execute();
        
    }

}
