<?php

namespace Thirday\Password;

class Password{
	private $pass;
	
	public function __construct($pass){
		$this->pass=trim($pass);	
		$this->verifyLength();
		$this->hashGenerate();		
	}
	/**
	* Verifica se esta preenchido o campo pass e se a senha 
	* possui pelo menos 8 caractéres
	*/
	private function verifyLength(){
		if(!$this->pass || mb_strlen($this->pass) < 8){
			throw new \Exception('Senha inferior a 8 caracteres');
		}
	}
	/**
	* Gera o hash da senha	
	*/
	private function hashGenerate(){
		$this->pass= password_hash($this->pass, PASSWORD_DEFAULT, ['cost'=>13]); 
			if(!$this->pass){
				throw new \Exception('Falha na geração do hash');
			}
	}
	function getPass() {
            return $this->pass;
        }


	
	
}
