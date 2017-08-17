<?php

namespace App\ Controller;

use App\Model\Endereco\MunicipioRepository;
use App\Model\Pedido\OrderItemModel;
use App\Model\Pedido\OrderModel;
use App\Model\Pedido\OrderRepository;
use App\Model\Pedido\PaymentMethodRepository;
use App\Model\Product\ProductRepository;
use App\Model\Shopping\CartItem;
use App\Model\Shopping\CartSession;
use App\Model\User\UserRepository;
use App\Model\Endereco\EstadoRepository;
use Thirday\Request\RequestFactory;
use App\Mvc\Controller;

class Pedido extends Controller
{

    private $pdo;
    private $cart;

    public function __construct($pdo)
    {
        parent::__construct();
        $this->pdo = $pdo;
        $this->cart = CartSession::getCart();
    }

    /**
     * Método responsável pela transformação dos itens do carrinho em um pedido
     */
    public function index()
    {
        $user = new UserRepository($this->pdo);
        $estado = new EstadoRepository($this->pdo);
        $municipio = new MunicipioRepository($this->pdo);
        /*$pagMetd= new PaymentMethodRepository($this->pdo);*/
        $atualUser = $user->getUserById($_SESSION['user']['id']);
        $estados = $estado->getEstados();
        $frete = new Frete();
        $municipioWithUser = $municipio->getMunicipioById($atualUser->getMunicipio_id());
        //Verifica se trata-se de registro íntegro na sessão
        if ($this->hasProductInCart() && $this->isUser()) {
            $this->view->set('h1', "Pedido > Pagamento");
            $this->view->set('cart', $this->cart->getTotal());
            $this->view->set('user', $atualUser);
            $this->view->set('frete', $frete->getStandardFrete());

            $order_id = $this->saveOrder();
            $this->saveOrderItens($order_id, $this->cart->getCartItems());
            $this->view->set('orderId', $order_id);
            /*$this->view->set('metodosDePagamento',$pagMetd->getMethods());*/
            $this->view->set('estados', $estados);
            $this->view->set('municipio', $municipioWithUser);
            $this->view->set('estado', $estado->getEstadoById($municipioWithUser->getEstado_id()));
            $this->view->setTitle("Escolha entre os melhores produtos");
            $this->cart->clear();
            $this->forPageFinalOrder($order_id);
            $this->view->render('pedido/checkout_01');


        } else {
            throw new \Exception("Não conseguimos processar seu pedido." . _CLASS_);
        }
    }

    /**
     * Método registra o salvamento do pedido no banco de dados
     * @return int ID do pedido
     */
    private function saveOrder()
    {
        $order = new OrderModel();
        $frete = new Frete();
        $order->setUserId((int)$_SESSION['user']['id']);
        $order->setPaymentMethodId(1);//PAG SEGURO - Por enquanto o único
        $order->setOrderStatusId(1);// Nesse momento sempre será Aguarda Pagamento
        $order->setFreight($frete->getStandardFrete());
        $order->setTotal($this->cart->getTotal());
        if($this->cart->getTotal()>0){
            return $order->save($this->pdo);
        }
    }

    /**
     * Médodo responsável pelo registro dos itens relacionados a um determinado pedido
     */
    private function saveOrderItens($order_id, Array $cartItens)
    {

        foreach ($cartItens as $item) {
            $itemModel = new OrderItemModel();
            $itemModel->setOrderId($order_id);
            $itemModel->setProductId($item->getProduct()->getId());
            $itemModel->setPrice($item->getProduct()->getPrice());
            $itemModel->setQuantity($item->getQuantity());
            $itemModel->setQuantityInCartoon($item->getQuantityInCarton());
            $itemModel->save($this->pdo);
            unset($itemModel);
        }
    }


    /**
     * Verifica se o carrinho está vazio
     */
    private function hasProductInCart()
    {
        if ((count($this->cart->getCartItems()) < 1) || ($this->cart->getTotal() === 0) ) {
            header('Location: ./');
        }
        return true;
    }

    /**
     * Confirma a existência do usuário no banco de dados
     */
    private function isUser()
    {
        $user = new UserRepository($this->pdo);
        if ($user->getUserById($_SESSION['user']['id'])) {
            return true;
        } else {//Caso chegue sem a existência de uma sessão ativa
            header("Location:./?page=user&action=login&error=invalidSession&next=pedido");
        }
    }

    public function processPayment()
    {
        var_dump($_POST);
    }

    /**
     * Redireciona para página de informações do pedido
     */
    private function forPageFinalOrder($order_id = ''){
        if($order_id !== ''){
            header("Location: ./?page=pedido&action=finalOrder&orderId=$order_id");
        }
    }

    /**
     * Exibe a página com informações sobre o pedido.
     */
    public function finalOrder(){
        if($this->isUser());
        $this->view->set('h1', "Pedido processado");
        $orderRep= new OrderRepository($this->pdo);
        $atualOrder =$orderRep->getOrder($_GET['orderId']);
        /**
         * Verifica a existência do pedido no BD e se ele pertence ao usuário logado
         */
        if($atualOrder && $this->isOrderFromUser($_SESSION['user']['id'],$atualOrder)){
            $this->view->set('order_id',$atualOrder->getId());
            $this->view->set('page_title',"Pedido finalizado, faça o pagamento com segurança.");
            $this->view->set('pedido', $atualOrder);
            $this->view->render('pedido/checkout_temp');

        }else{
            echo "Pedido não encontrado no Banco de dados.
            <br> Ou você não pode acessar esse pedido sem fazer login.";
        }
    }

    /**
     * Verifica se o pedido passado é do usuário
     * @param $userId
     * @param OrderModel $order
     * @return bool
     */
    private function isOrderFromUser($userId,OrderModel $order){
        if ($order->getUserId()===$userId){
            return true;
        }else{
            return false;
        }

    }

}
