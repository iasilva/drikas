<?php

namespace App\Model\Tag;

/**
 *
 * @author ivana
 */
interface ITagRepository {
public function getTags();
public function getTag($id);
}
