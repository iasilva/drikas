<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Thirday\Usuario;

/**
 * Description of Interessado
 *
 * @author Ivan
 */
class Prospecto extends \Thirday\Usuario\iUser
{
    public function __construct($dadosUsuario)
    {
        $this->nome=$dadosUsuario['nome'];
        $this->email=$dadosUsuario['email'];
        $this->telefone=$dadosUsuario['telefone'];
        $this->tipo="Prospecto";
        $this->cadastraUsuario();
        return $this->id;
    }

    public function cadastraUsuario()
    {
        parent::cadastraUsuario();
        
       
    }
    protected function validaUsuario()
    {
        
        return true;
    }
}