<?php
session_start();

require './vendor/autoload.php';

$sess = new \App\Model\Shopping\CartSession();
$prod = new \App\Model\Product\ProductRepository(\Database::conexao());
$produto=$prod->getProduct(8);
$produto2=$prod->getProduct(9);
$item = new \App\Model\Shopping\CartItem($produto, 1);
$item2 = new \App\Model\Shopping\CartItem($produto2, 5);
$sess->delete(6);


$itens=$sess->getCartItems();

var_dump($itens);