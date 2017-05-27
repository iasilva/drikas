<?php

namespace Thirday\Imagem;

/* Description of Registro
 *
 * @author ivana
 */

class UploadImagem {

    private $link;
    private $id;
    private $arquivo;
    private $msg;
    private $campoFormulario;

    public function __construct() {
        $this->msg = new \Thirday\Messages\MensagemFactory;
    }

    public function exec($campoFormulario) {
        $this->campoFormulario = $campoFormulario;
        $this->verificaRecebimento($campoFormulario);
        $this->erros();
        return $this->upload();
    }

    /**
     * A função desse método é simplesmente verificar a existencia do campo no
     * formulário submetido
     */
    private function verificaRecebimento($campoFormulario) {
        try {

            $arquivo = $_FILES[$campoFormulario];
            if (isset($arquivo)) {
                $this->arquivo = $arquivo;
            } else {
                $this->msg->exibeMensagem(new \Thirday\Messages\ErrorMessage, "Campo de formulário inexistente.");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Lança excessões caso encontre algum erro.
     * @return boolean
     */
    private function erros() {
        switch ($this->arquivo['error']) {
            case 0:
                return true;
            case 1:
                throw new \Exception("O arquivo no upload é maior do que o limite do PHP.", E_USER_ERROR);
            case 2:
                throw new \Exception("O arquivo ultrapassa o limite de tamanho especifiado no HTML.", E_USER_ERROR);
            case 3:
                throw new \Exception("O upload do arquivo foi feito parcialmente.", E_USER_ERROR);
            case 4:
                throw new \Exception("Não foi feito o upload do arquivo.", E_USER_ERROR);
            default:
                break;
        }
    }

    private function upload() {
        $storage = new \Upload\Storage\FileSystem('../images/peliculas');
        $file = new \Upload\File($this->campoFormulario, $storage);
        $new_filename = uniqid();
        $file->setName($new_filename);
        $file->addValidations(array(
            // Ensure file is of type "image/png"
            //new \Upload\Validation\Mimetype('image/png'),
            //You can also add multi mimetype validation
            new \Upload\Validation\Mimetype(array('image/png', 'image/gif', 'image/jpg', 'image/jpeg')),
            // Ensure file is no larger than 5M (use "B", "K", M", or "G")
            new \Upload\Validation\Size('1M')
        ));
        try {
            // Success!
            $file->upload();
            return $file->getNameWithExtension();
        } catch (\Exception $e) {
            // Fail!
            $errors = $file->getErrors();
        }
    }

}
