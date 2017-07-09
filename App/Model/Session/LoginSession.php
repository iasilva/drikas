<?php
namespace App\Model\Session;
use App\Model\User\UserModel;



class LoginSession {
    private $userForLogin;
    private $userInDatabase;
    /**
     * Prepara a classe para efetivar o logim
     * @param UserModel $userForLogin Dados inseridos no formulário
     * @param UserModel $userInDatabase Usuário recuperado do banco de dados
     */
    public function __construct(UserModel $userForLogin,UserModel $userInDatabase) {
        $this->userForLogin=$userForLogin;
        $this->userInDatabase=$userInDatabase;   
    }
    /**
     * Verifica a integridade das informações e faz a comparação entre os dados fornecidos
     * verifica se a senha confere com o hash armazenado no Banco de dados
     * @return boolean
     */
    public function logar(){
         $this->verifyIntegrity();
        return $this->compare();
    }
    /**
     * Efetiva a comparação da senha
     * @return boolean
     */
    private function compare(){
        if(password_verify($this->userForLogin->getSenha(), $this->userInDatabase->getSenha())){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * verifica se os objetos foram passados na ordem certa
     */
    private function verifyIntegrity(){
        if($this->userForLogin->getName()){
            throw new Exception("Usuário enviado indevidamente para login");
        }
    }
    public function __destruct() {
        unset($this->userForLogin);
        unset($this->userInDatabase);
    }
    
}
//$this->userForLogin->getName() !== NULL || $this->userForLogin->getName() !==''
