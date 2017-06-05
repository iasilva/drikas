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
    public function delete(){
       $img= new ImageModel;
       $img->setName("59171270be994.png");
       $excImg= new CleaningImageArquivo;
       $excImg->delete($img);
    }
}
