<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Session;

/**
 * Description of RealIpClient
 *
 * @author ivana
 */
class RealIpClient {

    private $ip;
    /**
     * Retorna o IP do Cliente
     * @return String com o Ip do Cliente
     */
    public function getIp(){
        $this->defineRealIp();
        return $this->ip;
    }
    /**
     * Faz a captura do IP do xliente
     */
    private function defineRealIp() {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $this->ip = filter_input(INPUT_SERVER, 'HTTP_CLIENT_IP');
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $this->ip = filter_input(INPUT_SERVER, 'HTTP_X_FORWARDED_FOR');         
        } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $this->ip = filter_input(INPUT_SERVER, 'HTTP_X_FORWARDED'); 
        } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $this->ip = filter_input(INPUT_SERVER, 'HTTP_FORWARDED_FOR');            
        } else if (isset($_SERVER['HTTP_FORWARDED'])) {
            $this->ip = filter_input(INPUT_SERVER, 'HTTP_FORWARDED');    
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $this->ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR');    
        } else {
            $this->ip = 'UNKNOWN';
        }
    }

}
