<?php

namespace App\Controller;
use App\Model\Pedido\OrderRepository;
use App\Model\User\UserRepository;
use App\Mvc\Controller;

/**
 * Description of Home
 *
 * @author ivana
 */
class Home extends \App\Mvc\Controller{
    private $pdo;
    public function __construct(\PDO $pdo)
    {
        $this->pdo=$pdo;
        parent::__construct();
    }

    public function index() {
        $this->view->render('home');
    }
    /**
     * Exibe a home de admin. Exige as categorias para a renderização do Admin
     * @param \App\Model\Category\iProductCategoryRepository $categories
     */
    public function admin(){
        $recentOrders= new OrderRepository($this->pdo);
        $user= new UserRepository($this->pdo);
        $this->view->set('orders',$recentOrders->getRecentOrders());



        $this->view->setTitle("Página administrativa -");
         $this->view->render('Admin/home');
    }
}
