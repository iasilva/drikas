<?php

/**
 * Description of ValidaNome
 *
 * @author Ivan
 */

namespace Thirday\Valida;

class ValidaBairro extends \Thirday\Valida\iValida {

    public function __construct() {

    }

    public function efetivarValidacao($campo) {
        $this->campo = $campo;
        $this->validaIntegridade();
        $this->validaComprimento();        
        return TRUE;
    }

    protected function validaComprimento() {
        if (strlen($this->campo) < 1) {
            $this->erro = true;
            throw new \Exception("Nome de bairro não válido.", E_USER_ERROR);
        }
    }

    protected function validaIntegridade() {
        if ($this->campo === '') {
            throw new \Exception("Campo obrigatório não preenchido.", E_USER_ERROR);
        }
    }

    /**
     * Verifica a forma se é apenas letra do alfabeto
     */
    protected function validaForma() {

    }

}
