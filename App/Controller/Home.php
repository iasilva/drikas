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
    public function admin(){
         $this->view->setTitle("Página administrativa -");
         $this->view->render('Admin/home');
    }
}
