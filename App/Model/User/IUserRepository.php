<?php


namespace App\Model\User;

/**
 * Contrato sobre a busca de dados sobre informações do usuário
 *
 * @author Ivan Alves da Silva
 */
abstract class IUserRepository {
    abstract function getUser($email);
    abstract function getUserById($id);
    abstract function getUserByCPF($CPF);
    abstract function getUserByCity($municipio_id);
    abstract function getUserByState($estado_id);
    abstract function getAll();
    
}
