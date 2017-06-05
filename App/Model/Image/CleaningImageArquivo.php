<?php

namespace App\Model\Image;

/**
 * Responsável pela exclusão do arquivo de imagem do servidor
 *
 * @author ivana
 */
class CleaningImageArquivo implements ICleaningImage {
    private $urlImagen= DIR . DS . 'images' . DS . 'peliculas' .DS;
    
    
    /**
     * Verifica a existência de determinado arquivo no servidor e existindo pro-
     * move a exclusão do mesmo. 
     * @param \App\Model\Image\ImageModel $image
     * @return boolean
     * @throws Exception
     */
    public function delete(ImageModel $image) {
        $this->urlImagen.=$image->getName();  
        if ($this->verifyImage()) {
            $this->exclude();
        }else{
            throw new \Exception('O arquivo ' . $this->urlImagen. ' Não foi encontrado no servidor.', E_USER_WARNING);
        }
    }
    /**
     * Verifica a existência do arquivo no servidor
     * @return boolean
     */
    private function verifyImage(){
        if(!is_file($this->urlImagen)){
            return FALSE;   
        }else{
            return TRUE;
        }
    }
    /**
     * Realiza a exclusão do arquivo no servidor
     * @return boolean
     * @throws Exception
     */
    private function exclude(){
         if (!unlink($this->urlImagen)) {
            throw new \Exception('Não conseguimos exluir o arquivo' . $this->urlImagen, E_USER_ERROR);
        } else {
            return TRUE;
        }
    }

}
