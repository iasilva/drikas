<?php

/**
 * Description of ValidaNome
 *
 * @author Ivan
 */

namespace Thirday\Valida;

class ValidaEnderecoNumero extends \Thirday\Valida\iValida {

    public function __construct() {
        locale_set_default("pt_BR");
    }

    public function efetivarValidacao($campo) {
        $this->campo = $campo;
        $this->validaComprimento();
        $this->validaIntegridade();
        $this->validaForma();
        return TRUE;
    }

    protected function validaComprimento() {
        if (strlen(trim($this->campo)) < 1) {
            throw new \Exception("Campo obrigatório não preenchido. Caso o endereço não possua número preencha com <b>SN</b>", E_USER_ERROR);
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
        if (!is_numeric($this->campo) && ($this->campo !== 'SN')) {
            if ($this->campo !== 'sn') {
                throw new \Exception("Fornato inválido para número.", E_USER_ERROR);
            }
        }
    }

}
