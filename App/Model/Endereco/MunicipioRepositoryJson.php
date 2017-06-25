<?php

namespace App\Model\Endereco;

/**
 * Realiza as consultas sobre município e retorna os dados em json
 *
 * @author ivana
 */
class MunicipioRepositoryJson extends iMunicipioRepository {

    private $table = "municipio";
    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getMunicipiosByEstadoId($estado_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE estado_id = :estado_id");
        $stmt->bindValue(":estado_id", $estado_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }

    public function getNomeMunicipiosByEstadoId($estado_id) {
        $stmt = $this->pdo->prepare("SELECT nome FROM $this->table WHERE estado_id = :estado_id");
        $stmt->bindValue(":estado_id", $estado_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->execute();
        $resJson = '[';
        $first = TRUE;

        while ($cidade = $stmt->fetch()) {
            if (!$first) {
                $resJson .= ',';
            } else {
                $first = FALSE;
            }
            $resJson .= json_encode($cidade['nome']);
        }
        $resJson .= ']';
        return $resJson;
    }

    public function getMunicipioById($municipio_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :municipio_id");
        $stmt->bindValue(":municipio_id", $municipio_id, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->execute();
        return json_encode($stmt->fetch());
    }

    public function getMunicipioByName($municipio_name) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE nome LIKE :nome ");
        $stmt->bindValue(":nome", "%" . $municipio_name . "%", \PDO::PARAM_STR);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }

    public function getNomeMunicipioByNameAndEstadoId($municipio_name, $estado_id) {
        $stmt = $this->pdo->prepare("SELECT nome FROM $this->table WHERE nome LIKE :nome AND estado_id = :estado_id ORDER BY nome ASC ");
        $stmt->bindValue(":nome", "%" . $municipio_name . "%", \PDO::PARAM_STR);
        $stmt->bindValue(":estado_id", "$estado_id", \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->execute();
        $resJson = '[';
        $first = TRUE;

        while ($cidade = $stmt->fetch()) {
            if (!$first) {
                $resJson .= ',';
            } else {
                $first = FALSE;
            }
            $resJson .= json_encode($cidade['nome']);
        }
        $resJson .= ']';
        return $resJson;
    }

    public function getMunicipiosByEstadoName($estado_name) {
        
    }

    public function getMunicipioByNameAndEstadoId($municipio_name, $estado_id) {
        
    }

}
