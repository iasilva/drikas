<?php
namespace App\Model\Product;

/**
 *
 * @author Ivan Alves da Silva
 */
interface ICreationProduct {
public function save(\App\Model\Product\ProductModel $product);
}
