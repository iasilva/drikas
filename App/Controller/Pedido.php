<?php

namespace App\ Controller;

use App\Model\Endereco\MunicipioRepository;
use App\Model\Pedido\PaymentMethodRepository;
use App\Model\Product\ProductRepository;
use App\Model\Shopping\CartSession;
use App\Model\User\UserRepository;
use App\Model\Endereco\EstadoRepository;
use Thirday\Request\RequestFactory;
use App\Mvc\Controller;

class Pedido extends Controller {

    private $pdo;

    public function __construct($pdo) {
        parent::__construct();
        $this->pdo = $pdo;
    }

    /**
     * Método responsável pela transformação dos itens do carrinho em um pedido
     */
    public function index() {
        $user = new UserRepository($this->pdo);
        $estado= new EstadoRepository($this->pdo);
        $municipio= new MunicipioRepository($this->pdo);
        $pagMetd= new PaymentMethodRepository($this->pdo);
        $atualUser=$user->getUserById($_SESSION['user']['id']);
        $estados= $estado->getEstados();
        $municipioWithUser=$municipio->getMunicipioById($atualUser->getMunicipio_id());
        //Verifica se trata-se de registro íntegro na sessão
        if ($this->hasProductInCart() && $this->isUser()) {
            $this->view->set('h1', "Pedido > Pagamento");
            $this->view->set('user',$atualUser);
            $this->view->set('metodosDePagamento',$pagMetd->getMethods());
            $this->view->set('estados', $estados);
            $this->view->set('municipio', $municipioWithUser );
            $this->view->set('estado',$estado->getEstadoById($municipioWithUser->getEstado_id()));
            $this->view->setTitle("Escolha entre os melhores produtos");
            $this->view->render('pedido/checkout_01');
        } else {
            throw new \Exception("Não conseguimos processar seu pedido." . _CLASS_);
        }
    }

    /**
     * Verifica se o carrinho está vazio
     */
    private function hasProductInCart() {
        $cart = new CartSession();
        if (count($cart->getCartItems()) < 1) {
            header('Location: ./');
        }
        return true;
    }

    /**
     * Confirma a existência do usuário no banco de dados
     */
    private function isUser() {
        $user = new UserRepository($this->pdo);
        if ($user->getUserById($_SESSION['user']['id'])) {
            return true;
        } else {//Caso chegue sem a existência de uma sessão ativa
            header("Location:./?page=user&action=login&error=invalidSession&next=pedido");
        }
    }

}
