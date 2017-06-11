<?php

namespace App\Model\Tag;
use App\Model\Tag\ICreationTag;
use App\Model\Tag\TagModel;

/**
 * Description of CreationTag
 *
 * @author ivana
 */
class CreationTag extends ICreationTag{
    public function __construct(\PDO $pdo) {
        $this->pdo=$pdo;
    }

    public function save(TagModel $tag) {
        $this->name= $tag->getName();
        $this->table=$tag->getTable();
        $this->insert();
        return $this->id;
    }
    private function insert(){
        $stmt= $this->pdo->prepare("INSERT INTO $this->table (name) VALUES (:name)");
        $stmt->bindParam(":name", $this->name,\PDO::PARAM_STR);
        $stmt->execute();
        $this->id= $this->pdo->lastInsertId();
    }

}
