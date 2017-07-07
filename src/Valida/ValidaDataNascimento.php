<?php

namespace Thirday\Valida;

use Thirday\Valida\iValida;

/**
 * Responsável pela validação de data de Nascimento
 *
 * @author ivana
 */
class ValidaDataNascimento extends iValida {

    public function efetivarValidacao($birth) {
        $this->campo = $birth;
        $this->validaIntegridade();
    }

    protected function validaComprimento() {
        
    }

    protected function validaForma() {
        
    }

    protected function validaIntegridade() {
        $hoje = new \DateTime('NOW', new \DateTimeZone('UTC'));
        $_1900 = new \DateTime("1900-01-01", new \DateTimeZone('UTC'));
        $this->campo->setTimezone(new \DateTimeZone('UTC'));

        if ($this->campo < $_1900 || $this->campo > $hoje) {
            throw new \Exception("Parece haver algo errado com a data de nascimento informada"
            . " <strong> Favor Verificar</strong>", E_USER_ERROR);
        }
    }

}
