<?php

namespace App\Controller;

use App\Model\Shopping\CartSession;
use Thirday\Request\RequestFactory;
use Thirday\Valida\Validacao;
use Thirday\Messages\Mensagem;

/**
 * Controller de teste
 *
 * @author ivana
 */
class Teste extends \App\Mvc\Controller {

    private $post;
    private $get;
    private $valida;
    private $msg;

    public function __construct() {
        parent::__construct();
        $this->post = new RequestFactory('post');
        $this->get = new RequestFactory('get');
        $this->valida = new Validacao();
        $this->msg = new \Thirday\Messages\MensagemFactory();
    }

    public function testeItensInCart(){
        $cart= new CartSession();
        $itens=$cart->getCartItems();
        var_dump($itens);
        unset($_SESSION['cart']);
    }

    public function validaEmailAjax() {
        $email = $this->post->captura('email');

        try {
            $this->valida->validar('email', $email);
            $this->msg->exibeMensagem(new \Thirday\Messages\SuccessMessage, "Email válido.");
        } catch (\Exception $exc) {            
            $this->msg->exibeMensagem(new \Thirday\Messages\ErrorMessage(), $exc->getMessage());
        }
    }

}
