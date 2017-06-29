<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Thirday\Valida;

/**
 * Description of iValidacao
 *
 * @author Ivan
 */
abstract class iValidacao {

    protected $campo;

    /**
     *
     * @var string - Recebe o nome da classe a ser instanciada
     */
    private $classe;

    abstract public function factoryValidar(\Thirday\Valida\iValida $tipo);

    /**
     *
     * @param String $tipo - Tipo de validação a ser feito (nome, email)
     * @param String $campo - String a ser validada
     * @return boolean
     */
    public function validar($tipo, $campo) {
        
        $this->campo=$campo;

        switch ($tipo) {
            case "email":
                $this->classe = "\Thirday\Valida\ValidaEmail";
                break;
            case "nome":
                $this->classe = "\Thirday\Valida\ValidaNome";
                break;
            case "cpf":
                $this->classe = "\Thirday\Valida\ValidaCpf";
                break;
            default:
                return false;
        }
        $this->factoryValidar(new $this->classe);
    }

}
