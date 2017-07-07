<?php

namespace App\Model\Session;

/**
 * Responsável pela efetivação das buscas de Sessões no banco de dados
 *
 * @author ivana
 */
class SessionRepository extends iSessionRepository {

    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Retorna todas as sessões ativas no sistema
     * @return array de objetos ou NULL
     */
    public function getAllSessionsActive() {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE deleted_at IS NULL");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Session\SessionModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Retorna todas as sessões de determinado usuário
     * @return array de objetos ou NULL
     */
    public function getAllSessionsByIdUser($user_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE user_id = :user_id ORDER BY created_at DESC");
        $stmt->bindValue(":user_id", $user_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Session\SessionModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Retorna todas as sessões ativas de determinado usuário
     * @return array de objetos ou NULL
     */
    public function getAllSessionsActiveByIdUser($user_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE user_id = :user_id AND deleted_at IS NULL");
        $stmt->bindValue(":user_id", $user_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Session\SessionModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Retorna determinada sessão pelo ID
     * @param int $id
     * @return object do tipo Session model
     */
    public function getSessionById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Session\SessionModel');
        $stmt->execute();
        return $stmt->fetch();
    }

    

}
