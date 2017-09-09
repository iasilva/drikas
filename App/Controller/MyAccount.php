<?php
/**
 * Created by PhpStorm.
 * User: Ivan Alves da Silva
 * Date: 16/08/2017
 * Time: 18:17
 */

namespace App\Controller;

use App\Model\Image\ImageRepository;
use App\Model\Pedido\ItemFromExibicaoRepository;
use App\Model\Pedido\OrderItemRepository;
use App\Model\Pedido\OrderModel;
use App\Model\Pedido\OrderRepository;
use App\Model\Product\ProductRepository;
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
        if (!$this->verifySessionUser()) {
            header("Location:./?page=user&action=login");
        }
    }

    /**
     * Método principal da minha conta - Exibe o básico dos usuários
     */
    public function index()
    {
        $this->view->setTitle("Minha conta. verifique os detalhes do seu pedido. ");
        $this->view->set("userId", $this->userId);
        $this->view->set("userName", $this->userName);
        $this->view->set("userEmail", $this->userEmail);
        $this->view->render("User/MyAccount/index");

    }

    /**
     * Começa a trabalhar os meus pedidos
     */
    public function myOrders()
    {
        if ($this->verifySessionUser()) {//Verifica se o usuário existe
            $orders = new OrderRepository($this->pdo);
            $this->view->setTitle("Meus pedidos.");
            $this->view->set("userId", $this->userId);
            $this->view->set("userName", $this->userName);
            $this->view->set("userEmail", $this->userEmail);
            $this->view->set("myOrders", $orders->getOrders($this->userId));

            $this->view->render("User/MyAccount/meus-pedidos");

        }
    }

    public function orderDetail($orderId)
    {
        if ($this->verifySessionUser()) {//Verifica se o usuário existe
            $orders = new OrderRepository($this->pdo);
            $order=$orders->getOrder($orderId);
            $this->view->setTitle($this->userName." Visualize seu pedido ".$orderId);
            $this->view->set("order",$order);
            $this->view->set("itens",$this->configOrderForExibition($order));
            $this->view->render('User/MyAccount/pedido-detalhe');

        }
    }
    public function Requests(){
            echo "Qual é macho";
    }


    /**
     * Configura a o objeto com os dados do usuário logado e retorna false caso não haja usuário logado
     * @return bool
     */
    private function verifySessionUser()
    {
        if ((isset($_SESSION['user']['id'])) && ($user_id = $_SESSION['user']['id'])) {
            $this->userId = $user_id;
            $this->userEmail = $_SESSION['user']['email'];
            $this->userName = $_SESSION['user']['name'];
            return true;

        } else {
            return false;
        }
    }

    private function configOrderForExibition(OrderModel $order){
        $item= new ItemFromExibicaoRepository($this->pdo);
        $itensDoPedido=$item->getItensFromOrder($order->getId());
        return $itensDoPedido;
    }


}