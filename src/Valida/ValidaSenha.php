<?php

namespace Thirday\Valida;

class ValidaSenha extends iValida {

  

    public function __construct() {

    }

    public function efetivarValidacao($senha) {
        $this->campo=$senha;           
        $this->validaComprimento();  
        $this->validaForma();
        }

    /**
     * Barra senha com sequencia de 3 caracteres iguais repetidamente
     */
    protected function validaForma() {
        $arrSenha = str_split($this->campo);
        $igual = false;
        
        for($i=2;$i<sizeof($arrSenha);$i++){
            $anterior=$i-1;
            $penultimo=$anterior-1;
            if(($arrSenha[$i]==$arrSenha[$anterior]) && $arrSenha[$anterior]==$arrSenha[$penultimo]){
                $igual=true;
            }
            if($igual){
                 throw new \Exception("Sequência superior a 2 dígitos repetidos não permitida. ", E_USER_ERROR);
            }
            
        }        
        
      
    }

   
        

    protected function validaIntegridade() {
       
    }

    /**
     * Verifica o comprimento da STRING
     * Deve ser chamado após Valida forma
     */
    protected function validaComprimento() {
        if (strlen($this->campo) < 8 ) {
            throw new \Exception("Senha não pode ser menor que 8 caracteres ", E_USER_ERROR);
        }
    }

}
