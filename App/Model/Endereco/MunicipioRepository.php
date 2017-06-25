<?php

namespace App\Model\Endereco;

class MunicipioRepository extends iMunicipioRepository {

    private $table = "municipio";
    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getMunicipiosByEstadoId($estado_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE estado_id = :estado_id");
        $stmt->bindValue(":estado_id", $estado_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Endereco\MunicipioModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getMunicipioById($municipio_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :municipio_id");
        $stmt->bindValue(":municipio_id", $municipio_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Endereco\MunicipioModel');
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getMunicipioByName($municipio_name) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE nome LIKE :nome ");
        $stmt->bindValue(":nome","%".$municipio_name."%", \PDO::PARAM_STR);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Endereco\MunicipioModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getMunicipioByNameAndEstadoId($municipio_name,$estado_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE nome LIKE :nome AND estado_id = :estado_id ORDER BY nome ASC ");
        $stmt->bindValue(":nome","%".$municipio_name."%", \PDO::PARAM_STR);
        $stmt->bindValue(":estado_id","$estado_id", \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Endereco\MunicipioModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getMunicipiosByEstadoName($estado_name) {
      
    }

}
