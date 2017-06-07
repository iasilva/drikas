<?php

namespace Thirday\Request;
use Thirday\Request\iRequest;

/**
 * Description of FileRequest
 *
 * @author ivana
 */
class FileRequest extends iRequest{
    
    public function processaRequest($campo) {
        $this->campo=$campo;
        
    }

}
