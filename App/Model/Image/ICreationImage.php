<?php

namespace App\Model\Image;

/**
 * Description of ICreationImage
 *
 * @author ivana
 */
abstract class ICreationImage {
    protected $pdo;
    abstract function save(ImageModel $img);
}
