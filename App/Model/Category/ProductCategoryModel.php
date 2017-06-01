<?php

namespace App\Model\Category;

/**
 * Description of Category
 * Classe Model da tabela
 *
 * @author ivana
 */
class ProductCategoryModel {

    private $table = "product_category";
    private $id;
    private $name;    
    /**
     * $id da categoria pai
     * @var parent 
     */
    private $parent;
    /**
     * Preenchido com as categorias filhas
     * @var array  
     */
    private $children = [];

    public function getTable() {
        return $this->table;
    }

    public function getChildren() {
        return $this->children;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getParent() {
        return $this->parent;
    }

    public function setChildren($children) {
        $this->children = $children;
    }

    public function setTable($table) {
        $this->table = $table;
    }

    public function setId($id) {
        if (!is_int($id)) {
            throw new \InvalidArgumentException("Id precisa ser um número inteiro");
        } else {
            $this->id = int($id);
        }
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setParent($parent) {
        if (!is_int($parent)) {
            throw new \InvalidArgumentException("Parent precisa ser um número inteiro");
        } else {
            $this->parent = $parent;
        }
    }

}
