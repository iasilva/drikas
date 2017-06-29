<?php

namespace Thirday\Valida;

class ValidaCpf extends iValida {

    private $cpf;

    public function __construct() {
        locale_set_default("pt_BR");
    }

    public function efetivarValidacao($cpf) {
        $this->cpf = $cpf;      
        $this->validaForma();
        $this->validaComprimento();
        $this->validaBasic();
        if (!$this->validaIntegridade()) {
            throw new \Exception("Esse número de CPF não é válido");
        }
    }

    /**
     * Elimina possíveis máscaras ou quaiquer cactére 
     * estranho ao CPF
     */
    protected function validaForma() {
        $this->cpf = preg_replace('/[^0-9]/', '', $this->cpf);
        $this->cpf = str_pad($this->cpf, 11, '0', STR_PAD_LEFT);
    }

    /**
     * Verifica se existe uma combinação sequencial de números repetidos
     */
    private function validaBasic() {
        $arrCpf = str_split($this->cpf);
        $igual = 0;
        foreach ($arrCpf as $digito) {
            if ($arrCpf[0] == $digito) {
                $igual++;
            }
        }
        if ($igual > 9) {
            throw new \Exception("Combinação não válida para CPF. ", E_USER_ERROR);
        }
    }

    protected function validaIntegridade() {
        for ($t = 9; $t < 11; $t++) {

            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $this->cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($this->cpf{$c} != $d) {
                return false;
            }
        }

        return true;
    }

    /**
     * Verifica o comprimento da STRING
     * Deve ser chamado após Valida forma
     */
    protected function validaComprimento() {
        if (strlen($this->cpf) != 11) {
            throw new \Exception("Número de dígitos não conferem com um CPF. ", E_USER_ERROR);
        }
    }

}
