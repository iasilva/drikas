
<?php
require_once '../vendor/autoload.php';
$categorias= new \App\Model\Category\ProductCategoryRepository(Database::conexao());

$prodi= new \App\Model\Product\ProductRepository(Database::conexao());

$rel= new \App\Model\Relationship\ProductTagModel();
//$rel->setProduct_id(1);
//$rel->setTag_id(8);
//$rel->save();
$qtd= $rel->deleteAllByTag(2);


$prod= new \App\Model\Product\ProductModel;

$prod->setDescription("Produtinho mais lindinho");
$prod->setPrice(3.94);

echo $prod->save(Database::conexao());




$tag= new \App\Model\Tag\TagRepository(Database::conexao());

