<?php

namespace App\Model\Image;

/**
 * Interface que determina as regras para o fornecimento de imagens
 * @author ivana
 */
interface IImageRepository {

    /**
     * Deve retornar todas as imagens vinculadas a um determinado produto;
     * @param int $product_id
     */
    public function getImages($product_id);

    /**
     * Deve retornar a imagem primária de um determinado produto;
     * @param int $product_id
     */
    public function getPrimaryImage($product_id);
}
