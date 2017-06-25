<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Endereco;

/**
 * Description of EstadoRepository
 *
 * @author ivana
 */
class EstadoRepository {
    private $pdo;
    private $table="estado";
    public function __construct(\PDO $pdo) {
        $this->pdo=$pdo;
    }
    public function getEstados() {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Endereco\EstadoModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
