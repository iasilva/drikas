<?php
namespace Thirday\Request;
use Thirday\Request\iRequestFactory;
use Thirday\Request\iRequest;

/**
 * Description of RequestFactory
 *
 * @author ivana
 */
class RequestFactory extends iRequestFactory {
    /**
     * 
     * @param string $tipo - Informe se a requisição é post, get ou file.
     */
    public function __construct($tipo) {
        $this->tipo=$tipo;
    }
    /**
     * Mátodo
     * @param iRequest $request
     * @return string do campo capturado
     */
    public function factoryCapture(iRequest $request) {
        return $request->processaRequest($this->campo);
    }
    public function updateTipo($tipo){
        $this->tipo=$tipo;
    }

}
