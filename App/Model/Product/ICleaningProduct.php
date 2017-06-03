<?php


namespace App\Model\Product;

/**
 *
 * @author Ivan Alves da Silva
 */
interface ICleaningProduct {
public function delete(ProductModel $product);
public function cleanIt(Array $tables, $product_id);     
}
