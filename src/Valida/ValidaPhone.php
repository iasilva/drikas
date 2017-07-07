<?php

namespace Thirday\Valida;

class ValidaPhone extends iValida {

    private $cpf;

    public function __construct() {
        locale_set_default("pt_BR");
    }

    public function efetivarValidacao($phone) {
        $this->campo=$phone;   
        $this->validaForma();
        $this->validaComprimento();  
        }

    /**
     * Elimina possíveis máscaras ou quaiquer cactére 
     * estranho ao CPF
     */
    protected function validaForma() {
        $this->campo = preg_replace('/[^0-9]/', '', $this->campo);        
    }

   
        

    protected function validaIntegridade() {
       
    }

    /**
     * Verifica o comprimento da STRING
     * Deve ser chamado após Valida forma
     */
    protected function validaComprimento() {
        if (strlen($this->campo) < 10 || strlen($this->campo)>11 ) {
            throw new \Exception("Número de dígitos não conferem com um telefone válido."
                    . "Utilize dois dígitos para DDD <b>(XX)</b> depois o número do seu celular. ", E_USER_ERROR);
        }
    }

}
