<?php


namespace App\Controller;
use App\Mvc\Controller;

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
    public function upload(){
        echo 'function upload()'; 
    }
    
}
