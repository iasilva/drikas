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
    private $userId;
    private $userName;
    private $userEmail;

    public function __construct($pdo)
    {
        parent::__construct();
        $this->pdo = $pdo;
        if(!$this->verifySessionUser()){
            header("Location:./?page=user&action=login");
        }
    }

    /**
     * Método principal da minha conta - Exibe o básico dos usuários
     */
    public function index(){
      $this->view->setTitle("Minha conta. verifique os detalhes do seu pedido. ");
      $this->view->set("userId",$this->userId);
      $this->view->set("userName",$this->userName);
      $this->view->set("userEmail",$this->userEmail);
      $this->view->render("User/MyAccount/index");

    }
    public function Requests(){
            echo "Qual é macho";
    }


    /**
     * Configura a o objeto com os dados do usuário logado e retorna false caso não haja usuário logado
     * @return bool
     */
    private function verifySessionUser(){
        if((isset($_SESSION['user']['id']))&&($user_id=$_SESSION['user']['id'])){
            $this->userId=$user_id;
            $this->userEmail=$_SESSION['user']['email'];
            $this->userName=$_SESSION['user']['name'];
            return true;

        }else{
            return false;
        }
    }





}