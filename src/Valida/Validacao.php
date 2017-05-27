<?php


namespace Thirday\Valida;

/**
 * Description of Validacao
 *
 * @author Ivan
 */
class Validacao extends \Thirday\Valida\iValidacao
{

    public function factoryValidar(\Thirday\Valida\iValida $tipo)
    {
        $tipo->efetivarValidacao($this->campo) ;
    }
}