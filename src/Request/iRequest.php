<?php

namespace Thirday\Request;

/**
 * Description of iRequest
 *
 * @author ivana
 */
abstract class iRequest {
    protected $tipo;
    protected $campo;
    protected $value;
    abstract public function processaRequest($campo);  
    abstract protected function filter();  
}
