<?php

namespace App\Controller;

use App\Mvc\Controller;
use App\Model\Product\IProductRepository;
use App\Model\Image\IImageRepository;
use App\Model\Category\iProductCategoryRepository;

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

    public function __construct(IProductRepository $product) {
        parent::__construct();
        $this->product = $product;
    }

    /**
     * Exibe a página pública de produtos
     * @param IImageRepository $images
     */
    public function index(IImageRepository $images) {
        $this->products = $this->product->getProducts();
        $this->configProductWithPrimaryImage($images);
        $this->view->set('products', $this->products);
        $this->view->setTitle("Escolha entre os melhores produtos");
        $this->view->render('produto/home');
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
    public function insert() {
        $msg = new \Thirday\Messages\MensagemFactory();
        $msg->exibeMensagem(new \Thirday\Messages\AlertMessage, "Obrigado por tentar inserir o produto");
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

}
