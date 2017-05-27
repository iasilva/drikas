<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Thirday\Valida;

/**
 * Description of Valida
 *
 * @author Ivan
 */
abstract class iValida
{
    protected $erro = false;
    protected $campo;
    abstract public function efetivarValidacao($campo);
    abstract protected function validaComprimento();
    abstract protected function validaForma();
    abstract protected function validaIntegridade();

}