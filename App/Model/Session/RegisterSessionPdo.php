<?php

namespace App\Model\Session;

use App\Model\Session\SessionModel;

/*
 * Responsável pela insersão da sessão no Banco de Dados
 */

class RegisterSessionPdo {

    private $pdo;
    private $session;

    public function __construct(\PDO $pdo, SessionModel $session) {
        $this->pdo = $pdo;
        $this->session = $session;
    }

    public function save() {
        $table = $this->session->getTable();
        $id = $this->session->getId();
        $ip = $this->session->getIp();
        $user_id = $this->session->getUser_id();
        $device = $this->session->getDevice();
        $so = $this->session->getSo();
        $browser = $this->session->getBrowser();
        return $this->insert($table, $id, $ip, $user_id, $device, $so, $browser);
    }

    private function insert($table, $id, $ip, $user_id, $device, $so, $browser) {
        $stmt = $this->pdo->prepare("INSERT INTO $table (id, ip, user_id, device, so, browser)"
                . "VALUES (:id, :ip, :user_id, :device, :so, :browser)");
        $stmt->bindParam(":id", $id, \PDO::PARAM_STR);
        $stmt->bindParam(":ip", $ip, \PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $user_id, \PDO::PARAM_INT);
        $stmt->bindParam(":device", $device, \PDO::PARAM_STR);
        $stmt->bindParam(":so", $so, \PDO::PARAM_STR);
        $stmt->bindParam(":browser", $browser, \PDO::PARAM_STR);
        try {
            $stmt->execute();
        } catch (\Exception $exc) {
            echo $exc->getMessage();         
        }

        return $this->pdo->lastInsertId();
    }

}

/*id, ip, user_id, created_at, device, so, browser, deleted_at*/