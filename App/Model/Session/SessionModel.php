<?php
namespace App\Model\Session;
use App\Model\Session\RegisterSessionPdo as Register;
use App\Model\Session\CloseSessionPdo;

/**
 * Model da tabela session
 *
 * @author ivana
 */
class SessionModel {
    private $id;
    private $ip;
    private $user_id;
    private $created_at;
    private $device;
    private $so;
    private $browser;
    private $deleted_at;
    private $table="session";
    
    function getId() {
        return $this->id;
    }

    function getIp() {
        return $this->ip;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function getCreated_at() {
        return $this->created_at;
    }

    function getDeleted_at() {
        return $this->deleted_at;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIp($ip) {
        $this->ip = $ip;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    function setDeleted_at($deleted_at) {
        $this->deleted_at = $deleted_at;
    }
    public function getDevice() {
        return $this->device;
    }

    public function getSo() {
        return $this->so;
    }

    public function getBrowser() {
        return $this->browser;
    }

    public function setDevice($device) {
        $this->device = $device;
    }

    public function setSo($so) {
        $this->so = $so;
    }

    public function setBrowser($browser) {
        $this->browser = $browser;
    }
    public function getTable() {
        return $this->table;
    }

     /**
     * Método responsável pelo salvamento das informações da sessão no banco de 
     * dados
     */
    public function save($pdo){
        $reg= new Register($pdo, $this);        
        return $reg->save();
    }
     public function close(\PDO $pdo){
        $sessaoPdo= new CloseSessionPdo($pdo);
        $sessaoPdo->close($this);
    }



    
}