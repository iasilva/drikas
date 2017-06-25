<?php

namespace App\Controller;

use App\Mvc\Controller;
use App\Model\Endereco\EstadoRepository;

class User extends Controller {


    /**
     * Exibe o formulário para cadastro de cliente
     */
    public function cadastro(EstadoRepository $est_repository) {    
        
        $this->view->set('estados',$est_repository->getEstados());        
        $this->view->setTitle("Faça seu cadastro na Drika's. A melhor loja Virtual para mulheres lindas -");
        $this->view->render('User/cadastro');
    }
    
    public function teste(){
       
       
    }

    


    public function insert() {
        var_dump($_POST);
    }

}

