<?php

namespace App\Model\Session;

/**
 * Inclui a data final para a sessão no banco de dados, fazendo com que ela 
 * seja considerada inativa *
 * @author Ivan Alves da Silva
 */
class CloseSessionPdo {

    private $pdo;
    private $session;
    private $table;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function close(SessionModel $session) {
        $this->table=$session->getTable();
        $now = new \DateTime('now', new \DateTimeZone('utc'));
        $deleted_at = $now->format('Y-m-d H:i:s');
        $this->update($session->getId(), $deleted_at);
    }
    private function update($id,$deleted_at){
        $stmt = $this->pdo->prepare("UPDATE $this->table SET deleted_at =:deleted_at WHERE id = :id  ");
        $stmt->bindParam(":id", $id, \PDO::PARAM_STR);
        $stmt->bindParam(":deleted_at", $deleted_at, \PDO::PARAM_STR);        
        try {
            $stmt->execute();
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
