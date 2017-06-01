<?php

namespace App\Model\Tag;

/**
 * Description of TagModel
 *
 * @author ivana
 */
class TagModel {

    private $id;
    private $name;
    private $table="tag";

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
    public function getTable() {
        return $this->table;
    }

    
    public function setId($id) {
        if (!is_int($id)) {
            throw new \InvalidArgumentException("Id precisa ser um número inteiro");
        } else {
            $this->id = $id;
        }
    }

    public function setName($name) {
        $this->name = $name;
    }

}
