<?php

namespace App\Model\User;

use App\Model\User\IUserRepository;

/**
 * Retorna conjutos de dados de usuários
 *
 * @author Ivan Alves da Silva
 */
class UserRepository extends IUserRepository {

    private $pdo;
    private $table = 'user';

    function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }
    /**
     * 
     * @return array de objetos com todos os usuários
     */
    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table ORDER BY name ASC");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\User\UserModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    /**
     * Retorna determinado usuario passando o email
     * @param atring $email
     * @return objeto de UserModel
     */
    public function getUser($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE email = :email");
        $stmt->bindValue(":email", $email, \PDO::PARAM_STR);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\User\UserModel');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getUserByCPF($CPF) {
       $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE cpf = :cpf");
        $stmt->bindValue(":cpf", $CPF, \PDO::PARAM_STR);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\User\UserModel');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getUserByCity($municipio_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE municipio_id = :municipio_id");
        $stmt->bindValue(":municipio_id", $municipio_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\User\UserModel');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\User\UserModel');
        $stmt->execute();
        return $stmt->fetch();
        
    }

    public function getUserByState($estado_id) {
        //IMplementar ap[os cadastros de usu[arios
        return FALSE;
    }

}
