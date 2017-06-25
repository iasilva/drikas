<?php

namespace Thirday\Json;

/**
 * Responsável pela transformação do carrinho em json
 *
 * @author ivana
 */
class JsonFormater {

    private $jsonString;

    public function startObject($key) {   
         $this->jsonString .= "\"" . $key . "\" : {";
    } 
    public function endObject() {  
         $i= strlen($this->jsonString)-1;
        $this->jsonString= substr( $this->jsonString, -0,$i);
        $this->jsonString = $this->jsonString . "},";
    } 
    
    /**
     * Insere formatos de pares valores
     * @param String $key
     * @param String $value
     */
    public function bind($key, $value) {        
        $this->jsonString .= "\"" . $key . "\" : \"" . $value . "\",";
    }
    
    /**
     * Fecha um conjunto de par, valor com chaves
     */
    public function around() {
        $i= strlen($this->jsonString)-1;
        $this->jsonString= substr( $this->jsonString, -0,$i);
        $this->jsonString = "{" . $this->jsonString . "}";
    }
    function getJsonString() {
        return $this->jsonString;
    }
}
