<?php

namespace App\Controller;

use App\Model\Image\ImageModel;
use App\Model\Image\CleaningImageArquivo;

/**
 * Controller de teste
 *
 * @author ivana
 */
class Teste {

    public function delete() {
        $img = new ImageModel;
        $img->setName("59171270be994.png");
        $excImg = new CleaningImageArquivo;
        $excImg->delete($img);
    }

    public function teste() {
        $rq = new \Thirday\Request\RequestFactory('post');
        $a = $rq->captura('categories');
        var_dump($a);
    }

    public function cat() {
        $proCat = new \App\Model\Relationship\ProductCategoryProductModel;
        $proCat->deleteAllByCategory(5);
    }

    public function tag() {
        $tag = new \App\Controller\Tag;
        $var = "Amor;Saúde-Doença PUREZA";

        $tag->separeTags($var);
    }
    
    public function rep(){
        var_dump($_SESSION['cart']);
    }

    
    public function updateCart() {
        /** Se no carrinho não tiver adiciona */
        /** Se tiver exclui do carrinho */
        if (!in_array($_POST['product_id'], $_SESSION['cart'])) {
            $_SESSION['cart'][] = $_POST['product_id'];
            echo '1';
        } else {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value == $_POST['product_id']) {
                    unset($_SESSION['cart'][$key]);
                    echo '0';
                }
            }
        }
    }

    public function updateIcon() {       
        echo count($_SESSION['cart']);
    }

    public function verifyCart() {
        if (in_array($_POST['product_id'], $_SESSION['cart'])) {
            echo '1';
        } else {
            echo '0';
        }
    }

}
