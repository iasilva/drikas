<?php

namespace App\Model\Product;

/**
 *
 * @author ivana
 */
interface IProductRepository {
public function getProducts();
public function getProduct($id);
}
