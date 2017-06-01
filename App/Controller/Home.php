<?php

namespace App\Controller;
use App\Mvc\Controller;

/**
 * Description of Home
 *
 * @author ivana
 */
class Home extends \App\Mvc\Controller{
    
    public function index() {
        $this->view->render('home');
    }
    /**
     * Exibe a home de admin. Exige as categorias para a renderização do Admin
     * @param \App\Model\Category\iProductCategoryRepository $categories
     */
    public function admin(){
         $this->view->setTitle("Página administrativa -");         
         $this->view->render('Admin/home');
    }
}
