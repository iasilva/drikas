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
        if (self::isAdmin($user->getId())){
            $_SESSION['user']['admin']['id']=$user->getId();
        }

        
    }
    private static function isAdmin($id){
        $pdo= \Database::conexao();
        $stmt = $pdo->prepare("SELECT * FROM user_admin WHERE user_id = :id");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Session\SessionModel');
        $stmt->execute();
        return $stmt->fetch();
    }

}
