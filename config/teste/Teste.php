<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Teste
 *
 * @author ivana
 */
class Teste {
    public function __construct() {
        $msg=new MensagemFactory();
        $msg->exibeMensagem(new InfoMessage(),"Objeto TESTE instanciado." );        
    }
}
