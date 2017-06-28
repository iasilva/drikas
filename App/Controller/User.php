<?php

namespace App\Controller;

use App\Mvc\Controller;
use App\Model\Endereco\EstadoRepository;
use App\Model\User\UserModel;
use App\Model\User\ValidaUser;

class User extends Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Exibe o formulário para cadastro de cliente
     */
    public function cadastro(EstadoRepository $est_repository) {

        $this->view->set('estados', $est_repository->getEstados());
        $this->view->setTitle("Faça seu cadastro na Drika's. A melhor loja Virtual para mulheres lindas -");
        $this->view->render('User/cadastro');
    }

    /**
     * Responsável por receber todas as solicitações de validações por ajax
     * relacionadas a validar dados do usuário;
     */
    public function validaUserAjax() {
        $post= new \Thirday\Request\RequestFactory('post');
        $valida = new \App\Model\User\ValidaUser;
        list($erros, $alerts) = $valida->valida($post->captura('campo'), $post->captura('valor'));
        if ($erros) {
           echo $erros[0];
        }else{
            echo '1';
        }
    }

    public function insert() {
        
    }

}
