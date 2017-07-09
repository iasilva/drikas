<?php
namespace App\Model\Session;
use App\Model\User\UserModel;

/**
 * Registra os dados do usuário na sessão local
 */
class RegisterLocaleSession {
    public static function register(UserModel $user){
        $_SESSION['user']['email']=$user->getEmail();
        $_SESSION['user']['name']=$user->getName();
        $_SESSION['user']['id']=$user->getId();
        
    }
}
