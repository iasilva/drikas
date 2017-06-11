<?php

namespace App\Model\Tag;
use App\Model\Tag\TagModel;

/**
 * Description of ICreationTag
 *
 * @author ivana
 */
abstract class ICreationTag {
    protected $pdo;
    protected $id;
    protected $name;
    protected $table;
    abstract function save(TagModel $tag);
}