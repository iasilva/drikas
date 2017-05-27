<?php

//APENAS PARA CONHECIMENTO DE CHAMADA

namespace Thirday\Valida;

/**
 * Description of Cliente
 *
 * @author Ivan
 */
class Cliente
{
    public function __construct()
    {
        $valida= new \Thirday\Valida\Validacao;
        $valida->validar("email", "Ivanalvesdasilva@er.com");
    }
}