<?php

/*
 * The MIT License
 *
 * Copyright 2017 Ivan Alves da Silva.
 */

namespace App\Controller;

use App\Mvc\Controller;

/**
 * Description of Cart
 *
 * @author Ivan Alves da Silva
 */
class Cart extends Controller {
    public function index(){
        $this->view->setTitle("Carrinho de compras Drika's");
        $this->view->render('cart');
    }
}
