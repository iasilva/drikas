<?php

namespace App\Model\Tag;

use App\Model\Tag\ITagRepository;

/**
 * Description of TagRepositoy
 *
 * @author ivana
 */
class TagRepository implements ITagRepository {

    private $pdo;
    private $table;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
        $tbl = new TagModel();
        $this->table = $tbl->getTable();
    }

    public function getTag($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Tag\TagModel');
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getTagByName($name) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE name = :name");
        $stmt->bindValue(":name", $name, \PDO::PARAM_STR);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Tag\TagModel');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getTags() {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table ORDER BY name ASC");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Tag\TagModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
