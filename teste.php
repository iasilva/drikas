<?php
require './vendor/autoload.php';


$pdo= Database::conexao();

$prod= new \App\Model\Product\ProductRepository($pdo);
$p=$prod->getProducts();
var_dump($p);
?>



<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="foo" value=""/>
    <input type="submit" value="Upload File"/>
</form>