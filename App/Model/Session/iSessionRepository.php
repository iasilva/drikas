<?php


namespace App\Model\Session;

/**
 * Contrato sobre as formas de busca a sessão de usuário
 *
 * @author Ivan Alves da Silva
 * @copyright (c) 2017, Thirday
 */
abstract class iSessionRepository {
    protected $table="session";       
    abstract function getAllSessionsActive();
    abstract function getAllSessionsActiveByIdUser($user_id);
}
