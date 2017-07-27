<?php

namespace App\Controller;

use App\Mvc\Controller;
use App\Model\Endereco\EstadoRepository;
use App\Model\User\UserModel;
use App\Model\User\ValidaUser;

class User extends Controller {

    private $post;

    public function __construct() {
        parent::__construct();
        $this->post = new \Thirday\Request\RequestFactory('post');
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
        $valida = new \App\Model\User\ValidaUser;
        list($erros, $alerts) = $valida->valida($this->post->captura('campo'), $this->post->captura('valor'));
        if ($erros) {
            echo $erros[0];
            unset($alerts);
        } else {
            echo '1';
        }
    }

    public function insert() {
        $newUser = new UserModel;
        $newUser->setEmail($this->post->captura('email'));
        $newUser->setPhone($this->post->captura('phone'));
        $newUser->setSenha($this->post->captura('senha'));
        $newUser->setSexo($this->post->captura('sexo'));
        $newUser->setName($this->post->captura('name'));
        $newUser->setCpf($this->post->captura('cpf'));
        $newUser->setBirth(new \DateTime($this->post->captura('birth'), new \DateTimeZone("UTC")));
        $newUser->setLogradouro($this->post->captura('logradouro'));
        $newUser->setNumero($this->post->captura('numero'));
        $newUser->setBairro($this->post->captura('bairro'));
        $newUser->setMunicipio_id($this->post->captura('cidade'));
        $newUser->setCep($this->post->captura('cep'));
        $valida = new \App\Model\User\ValidaUser;
        list($erros, $alerts) = $valida->validaAll($newUser);
        if ($erros) {
            foreach ($erros as $erro) {
                if (strpos($erro, 'login')) {
                    /* Caso a pessoa já possua cadastro cadastrado (cpf ou email) */
                    header('Location:./?page=user&action=login&error=doubleInsert');
                } else {
                    /* Caso seja outro tipo de dado inválido, chama ação que re-apresentaré o formulário de cadastro */
                    $this->registerByError($erros, $alerts, $newUser);
                }
            }
        } elseif ($newUser->save()) {             
            header("Location:./?page=user&action=login&success=true");  
        }
    }

    /**
     * Método que rechama o formulário de cadastro preeenchido em caso de erros
     * @param type $erros
     * @param type $alerts
     * @param UserModel $user
     */
    private function registerByError($erros, $alerts, UserModel $user) {      
              header("Location:./?page=user&action=cadastro&error");    
            
    }

    public function login() {
        if(!isset($_SESSION['user'])){
        $this->view->setTitle("Registre-se na loja da beleza feminina, encontre as mais lindas joinhas e películas de unha - ");
        $this->view->render('User/login');
        }else{
            header("Location: ./");
        }
    }
    

}
