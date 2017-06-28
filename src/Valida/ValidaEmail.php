<?php

/**
 * Description of ValidaEmail
 *
 * @author Ivan
 */

namespace Thirday\Valida;

class ValidaEmail extends \Thirday\Valida\iValida {

    private $padrao = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";

    public function efetivarValidacao($email) {
        $this->campo = $email;
        $this->validaComprimento();
        $this->validaForma();
        
    }

    protected function validaComprimento() {
        if (strlen($this->campo) <= 5) {
            $this->erro = true;
            throw new \Exception(" Email avaliado não passou na"
            . " validação de comprimento. Emails precisam de ao "
            . "menos 10 caracteres. ", E_USER_ERROR);
        }
    }

    protected function validaIntegridade() {
        
    }

    /**
     * Verifica a forma se é apenas letra do alfabeto
     */
    protected function validaForma() {

        if (preg_match($this->padrao, $this->campo)) {
            return true;
        } else {
            $this->erro = true;
            throw new \Exception(" Email avaliado não passou na"
            . " validação. Formato incompatível.", E_USER_ERROR);
        }
    }

}
