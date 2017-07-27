<?php

namespace App\Model\User;

use App\Model\User\UserModel;

/**
 * Responsável pela inserção dos dados do Usuário no banco de dados
 *
 * @author ivana
 */
class CreationUser {

    private $pdo;
    private $user;

    public function __construct() {
        $this->pdo = \Database::conexao();
    }

    public function save(UserModel $user) {
        $this->user = $user;
        $this->insert();
        return $this->user;
    }

    private function insert() {
        $name = ucwords(strtolower($this->user->getName()));
        $cpf = $this->user->getCpf();
        $sexo = $this->user->getSexo();
        $email = strtolower($this->user->getEmail());
        $phone = $this->user->getPhone();
        $senha = $this->user->getSenha();
        $logradouro = $this->user->getLogradouro();
        $num = strtoupper($this->user->getNumero());
        $bairro = $this->user->getBairro();
        $birth=$this->user->getBirth()->format('Y/m/d');
        $municipio_id=$this->user->getMunicipio_id();
        $cep=$this->user->getCep();
        $stmt = $this->pdo->prepare($this->prepareSql());
        $stmt->bindParam(":name", $name, \PDO::PARAM_STR);
        $stmt->bindParam(":cpf", $cpf, \PDO::PARAM_STR);
        $stmt->bindParam(":sexo", $sexo, \PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, \PDO::PARAM_STR);
        $stmt->bindParam(":phone", $phone, \PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha, \PDO::PARAM_STR);
        $stmt->bindParam(":logradouro", $logradouro, \PDO::PARAM_STR);
        $stmt->bindParam(":numero", $num, \PDO::PARAM_STR);
        $stmt->bindParam(":bairro", $bairro, \PDO::PARAM_STR);
        $stmt->bindParam(":birth", $birth, \PDO::PARAM_STR);
        $stmt->bindParam(":cep", $cep, \PDO::PARAM_STR);
        $stmt->bindParam(":municipio_id",$municipio_id , \PDO::PARAM_INT);
        $stmt->execute();        
        $this->user->setId($this->pdo->lastInsertId());
    }

    private function prepareSql() {
        return "INSERT INTO {$this->user->getTable()}"
                . " (name, cpf, sexo, email, phone, senha, logradouro, numero,
                    bairro, birth, municipio_id,cep)"
                . " VALUES (:name,:cpf,:sexo,:email,:phone,:senha,:logradouro,
                    :numero,:bairro,:birth,:municipio_id,:cep)";
    }

}
