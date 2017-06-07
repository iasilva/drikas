<?php

namespace Thirday\Request;

use Thirday\Request\iRequest;

/**
 * Description of RequestFactory
 *
 * @author ivana
 */
abstract class iRequestFactory {

    protected $tipo;
    protected $campo;
    private $request;

    abstract public function factoryCapture(iRequest $request);

    /**
     * 
     * @param string $campo - nome do campo a ser capturado
     * @return string - Valor do campo capturado
     */
    public function captura($campo) {
        $this->campo = $campo;
        $this->defineRequest();
        return $this->factoryCapture($this->request);
    }

    /**
     * Método apura, com base no tipo de requisição informada qual classe ele 
     * deve instanciar, dentro dos tipos de requisições 
     */
    private function defineRequest() {
        $class = "Thirday\Request\\" . ucfirst($this->tipo) . "Request";
        $this->request = new $class;
    }

}
