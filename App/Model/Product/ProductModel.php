<?php

namespace App\Model\Product;

/**
 * Classe Model da entidade Product
 *
 * @author Ivan Alves da Silva
 */
class ProductModel {

    private $id;
    private $description;
    private $price;
    private $created_at;
    private $updated_at;
    private $deleted;
    private $images=[];

    public function setId($id) {
        if (!is_int($id)) {
            throw new \InvalidArgumentException("Id precisa ser um número inteiro");
        } else {
            $this->id = $id;
        }
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrice($price) {
        if (!is_float($price)) {
            throw new \InvalidArgumentException("Preço precisa ser um número ponto flutuante");
        } else {
            $this->price = $price;
        }
    }

    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    public function setUpdated_at($updated_at) {
        $this->updated_at = $updated_at;
    }
    /**
     * Seta para marcar se determinado produto está deletado no banco de dados
     * Aceitando apenas parâmetro inteiro 0(zero) ou 1(um). Cuidando que sempre 
     * que não for 1(deletado), ele supõe ser 0(Não deletado)
     * @param int $deleted
     * @throws \InvalidArgumentException
     */
    public function setDeleted($deleted) {
        if (!is_int($deleted)) {
            throw new \InvalidArgumentException("Deleted precisa ser um número inteiro");
        } else {
            if (int($deleted) !== 1) {
                $this->deleted = 0;
            }else{
            $this->deleted = $deleted;                
            }
        }
    }
    public function getImages() {
        return $this->images;
    }

    public function setImages($images) {
        $this->images = $images;
        return $this;
    }

        public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCreated_at() {
        return $this->created_at;
    }

    public function getUpdated_at() {
        return $this->updated_at;
    }

    public function getDeleted() {
        return $this->deleted;
    }
}
