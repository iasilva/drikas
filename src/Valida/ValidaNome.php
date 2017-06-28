<?php

/**
 * Description of ValidaNome
 *
 * @author Ivan
 */

namespace Thirday\Valida;

class ValidaNome extends \Thirday\Valida\iValida {

    public function __construct() {
        locale_set_default("pt_BR");        
    }

    public function efetivarValidacao($campo) {
        $this->campo = $campo;
        $this->validaComprimento();
        $this->validaForma();
    }

    protected function validaComprimento() {
        if (strlen($this->campo) <= 5) {
            $this->erro = true;
            throw new \Exception("Nome avaliado não passou na"
            . " validação de comprimento. Nomes precisam de ao "
            . "menos 5 caractéres", E_USER_ERROR);
        }
    }

    protected function validaIntegridade() {
        
    }

    /**
     * Verifica a forma se é apenas letra do alfabeto
     */
    protected function validaForma() {

        if (!preg_match("/^([a-z-A-Z ]+)$/i", $this->campo)) {
            throw new \Exception("Nome avaliado não passou na"
            . " validação de forma. Nomes precisam ser composto "
            . "apenas por caracteres locais", E_USER_ERROR);
        } else {
            return true;
        }
    }

}
