<?php

namespace App\Model\Session;

/**
 * Inclui a data final para a sessão no banco de dados, fazendo com que ela 
 * seja considerada inativa *
 * @author Ivan Alves da Silva
 */
class CloseSessionPdo {

    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }
    public function close(SessionModel $session){
        
    }
    

}
