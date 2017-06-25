<?php


namespace App\Controller;
use App\Model\Relationship\ProductCategoryProductModel;

class Category extends \App\Mvc\Controller{
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Responsável por intermediar os relacionamentos entre produto e categoria
     * @param int $product_id
     * @param array $categories
     */
    public function relationshipWithProduct($product_id, array $categories){
        $catProd= new ProductCategoryProductModel;
        foreach ($categories as $category){
            $catProd->setCategory_id($category);
            $catProd->setProduct_id($product_id);
            $catProd->save();
        }
    }
}
