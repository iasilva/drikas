<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Thirday\Usuario;

/**
 * Description of UserClient
 *
 * @author Ivan
 */
class UserClient
{
    private $user;

    public function __construct()
    {
       
        if ($this->capture()) {

            new \Thirday\Usuario\Prospecto($this->user);
        }
    }

    private function capture()
    {
        $this->user['nome']     = filter_input(INPUT_POST, 'nome');
        $this->user['email']    = filter_input(INPUT_POST, 'email',
            FILTER_VALIDATE_EMAIL);
        $this->user['telefone'] = filter_input(INPUT_POST, 'celular');

        if (count($this->user) < 3) {
            return false;
        } else {
            return true;
        }
    }
}