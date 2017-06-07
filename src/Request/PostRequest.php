<?php

namespace Thirday\Request;
use Thirday\Request\iRequest;

/**
 * Description of PostRequest
 *
 * @author ivana
 */
class PostRequest extends iRequest{
    
    public function processaRequest($campo) {      
        $this->campo=$campo;
        $this->filter();        
        return $this->value;
    }
    protected function filter(){
        $this->value= trim(filter_input(INPUT_POST, $this->campo));
    }

}
