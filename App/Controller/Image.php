<?php

namespace App\Controller;

use App\Mvc\Controller;
use Thirday\Imagem\UploadImagem;

/**
 * Description of Image
 *
 * @author ivana
 */
class Image extends Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Trabalha o upload e retorna o nome da imagem salva
     * Inicialmente, sempre salvando no caminho Imagem/Peliculas
     */
    public function upload() {
        $imgUpload = new UploadImagem();     // Instancia a que faz o upload
        //Executa o upload 
        return $imgUpload->exec("product_image");
    }

}
