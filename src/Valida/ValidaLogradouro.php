<?php

/**
 * Description of ValidaNome
 *
 * @author Ivan
 */

namespace Thirday\Valida;

class ValidaLogradouro extends \Thirday\Valida\iValida {

    public function __construct() {

    }

    public function efetivarValidacao($campo) {
        $this->campo = $campo;
        $this->validaIntegridade();
        $this->validaComprimento();
        $this->validaForma();
        return TRUE;
    }

    protected function validaComprimento() {
        if (strlen($this->campo) < 4) {
            $this->erro = true;
            throw new \Exception("Nome avaliado não passou na"
            . " validação de comprimento. Nomes precisam de ao "
            . "menos 4 caractéres", E_USER_ERROR);
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
        if(is_numeric($this->campo)){
            throw new \Exception("Fornato inválido para logradouro.", E_USER_ERROR);
        }
    }

}
