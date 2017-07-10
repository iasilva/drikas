<?php
namespace App\Model\Session;

/**
 * Inclui a data final para a sessão no banco de dados, fazendo com que ela 
 * seja considerada inativa *
 * @author Ivan Alves da Silva
 */
class SessionUpdateUserPdo {

    private $pdo;
    private $session;
    private $table;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function updateUser(SessionModel $session) {
        $this->table=$session->getTable();
        $user= $session->getUser_id();
		 $id= $session->getId();
    }
    private function update($user,$id){
        $stmt = $this->pdo->prepare("UPDATE $this->table SET user_id =:user_id WHERE id = :id  ");
        $stmt->bindParam(":id", $id, \PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $user_id, \PDO::PARAM_STR);        
        try {
            $stmt->execute();
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
