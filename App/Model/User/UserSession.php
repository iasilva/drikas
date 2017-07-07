<?php

namespace App\Model\User;
use App\Model\User\UserModel;

/**
 * Responsável pelos procedimentos de login, logout
 *
 * @author Ivan Alves da Silva
 * 
 */
class UserSession {
    private $user;
    
    /**
     * Para instanciação é necessário um objeto com email e senha preenchidos
     * @param UserModel $user - Objeto com os dados o usuário
     */
    public function __construct(UserModel $user) {
        if ($user->getEmail() && $user->getSenha()){
            $this->user=$user;
        }else{
            throw new \Exception("Para a criação da sessão do usuário é necessário que"
                    . " haja o fornecimento de um objeto de usuário com os dados mínimos");        }
    }
}
