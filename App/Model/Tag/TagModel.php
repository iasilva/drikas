<?php

namespace App\Model\Tag;
use App\Model\Tag\CreationTag;
use App\Model\Tag\TagRepository;

/**
 * Description of TagModel
 *
 * @author ivana
 */
class TagModel {

    private $id;
    private $name;
    private $table="tag";
    private $pdo;    

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
    
    public function save(ITagRepository $repTag, ICreationTag $creationTag){
        $tag=$repTag->getTagByName($this->name);
        if (!$tag) {
            return $creationTag->save($this);
        } else {
            return $tag->getId();
        }
    }

}
