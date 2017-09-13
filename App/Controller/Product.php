<?php

namespace App\Controller;

use App\Model\Category\ProductCategoryRepository;
use App\Model\Tag\TagRepository;
use App\Mvc\Controller;
use App\Model\Product\ProductModel;
use App\Model\Product\IProductRepository;
use App\Model\Image\ImageModel;
use App\Model\Image\IImageRepository;
use App\Model\Category\iProductCategoryRepository;
use \Thirday\Request\RequestFactory;
use App\Controller\Image;
use App\Controller\Category;
use App\Controller\Tag;


/**
 * Classe Controller de Product
 *
 * @author ivana
 */
class Product extends Controller {

    /**
     * Armazena o objeto de repositório
     * @var IProductRepository 
     */
    private $product;

    /**
     * Armaze um array de produtos retornados da consulta
     * @var array 
     */
    private $products;

    private $pdo;

    public function __construct(IProductRepository $product) {
        parent::__construct();
        $this->product = $product;
        $this->pdo=\Database::conexao();
    }

    /**
     * Exibe a página pública de produtos
     * @param IImageRepository $images
     */
    public function index(IImageRepository $images) {
        $tag= new TagRepository($this->pdo);
        $this->products = $this->product->getProducts();
        $this->configProductWithPrimaryImage($images);
        $this->view->set('h1',"Películas de unha Drika's");
        $this->view->set('tags',$tag->getTags());
        $this->view->set('products', $this->products);
        $this->view->setTitle("Escolha entre os melhores produtos");
        $this->view->render('produto/home');
    }

    /**
     * Método utilizado para a exibição de produtos por categoria
     * @param IImageRepository $images
     */
    public function categoryView (IImageRepository $images) {
        if($categoryReturned= $this->verifyCategoryGet()){
            $this->products = $this->product->getProductsByCategory($categoryReturned->getId());
            $this->configProductWithPrimaryImage($images);
            $tag= new TagRepository($this->pdo);
            $this->view->set('tags',$tag->getTags());
            $this->view->set('h1',$categoryReturned->getName() . " - Drika's");
            $this->view->set('products', $this->products);
            $this->view->setTitle($categoryReturned->getName()." - Escolha entre os melhores produtos. ");
            $this->view->render('produto/home');
        }else{
            $this->noProducts();
        }
    }

    /**
     * Método utilizado para a exibição de produtos com base na tag
     * @param IImageRepository $images
     */
    public function tagView (IImageRepository $images) {
        $get= new RequestFactory('get');
        $tag_name=$get->captura('name');
        if($this->products=$this->product->getProductsByTagName($tag_name)){
            $this->configProductWithPrimaryImage($images);
            $tag= new TagRepository($this->pdo);
            $this->view->set('tags',$tag->getTags());
            $this->view->set('h1',$tag_name . " - Drika's");
            $this->view->set('products', $this->products);
            $this->view->setTitle($tag_name." - Escolha entre os melhores produtos. ");
            $this->view->render('produto/home');
        }else{
            $this->noProducts();
        }


    }



    /**
     * Exibe o formulário de cadastro de produtos
     */
    public function cadastrar(iProductCategoryRepository $categories, $masterCat) {
        $this->view->setTitle("Formulário de cadastro de produtos");
        $this->view->set('categories', $categories->getSubCategories($masterCat));
        $this->view->render('admin/form-cad-product');
    }
    /**
     * Processa o formulário para a real criação de um produto
     */
    public function insert(\PDO $pdo) {
        $produto= new ProductModel;
        $imgModel=new ImageModel;
        $img= new Image;  
        $category= new Category;
        $tag= new Tag;
        $rq=new \Thirday\Request\RequestFactory('post');
        $produto->setDescription($rq->captura('description'));        
        $produto->setPrice($rq->captura('price'));      
        $idProduto= (int) $produto->save($pdo);
        $imgModel->setName($img->upload());
        $imgModel->setIs_Primary(1);
        $imgModel->setProduct_id($idProduto);
        $imgModel->save($pdo);
        $category->relationshipWithProduct($idProduto, $rq->captura("categories"));
        $tag->insert($rq->captura('tags'), $idProduto);
        header("Location: ./?page=product&action=cadastrar&success");
        
    }

    /**
     * Configura todos os produtos com sua imagem principal
     * @param IImageRepository $images
     */
    private function configProductWithPrimaryImage(IImageRepository $images) {
        
        foreach ($this->products as $key => $product) {            
            $imagens = $images->getPrimaryImage($product->getId());
            $this->products[$key]->setImages($imagens);
        }
    }

    /**
     * Configura todos os produtos com suas todas imasgens vinculadas 
     * @param IImageRepository $images
     */
    private function configProductWithAllImages(IImageRepository $images) {
        foreach ($this->products as $key => $product) {
            $imagens = $images->getImages($product->getId());
            $this->products[$key]->setImages($imagens);
        }
    }

    /**
     * Valida uma categoria passada via get como uma variável 'id'
     * @return Object da categoria solicitada caso verdadeira
     */
    private function verifyCategoryGet(){
        $get= new RequestFactory('get');
        $cat= new ProductCategoryRepository($this->pdo);
        $category_id=$get->captura('id');
        if($categoryReturned=$cat->getCategory($category_id)){
           return $categoryReturned;
        }else{
            return 0;//false
        }
    }

    private function noProducts(){
        $tag= new TagRepository($this->pdo);
        $this->view->set('tags',$tag->getTags());
        $this->view->setTitle("Não encontramos produtos relacionados a sua solicitação");
        $this->view->set('h1',"Nenhum produto (^~^)");
        $this->view->render('produto/no-products');

    }

}
