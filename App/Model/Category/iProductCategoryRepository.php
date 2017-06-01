<?php


namespace App\Model\Category;

/**
 *
 * @author ivana
 */
interface iProductCategoryRepository {    
public function getCategories();
public function getSubCategories($idParent);
public function getAllCategories();
public function getAllSubCategories($idParent);
}
