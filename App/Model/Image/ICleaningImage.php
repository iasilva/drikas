<?php


namespace App\Model\Image;

/**
 * A finalidade é administrar a limpeza de imagens, deletar do banco de dados e 
 * excluir o arquivo do diretório.
 *
 * @author ivana
 */
interface ICleaningImage {
    public function delete(ImageModel $image);
}
