<?php
/**
 * Created by PhpStorm.
 * User: Ivan Alves da Silva
 * Date: 16/08/2017
 * Time: 18:17
 */

namespace App\Controller;

use App\Mvc\Controller;

/**
 * Class MyAccount Responsável dos dados da conta do usuário, inclusive para a exibição dos pedidos do usuário
 * @package App\Controller
 */
class MyAccount extends Controller
{
    private $pdo;

    public function __construct($pdo)
    {
        parent::__construct();
        $this->pdo = $pdo;
    }

}