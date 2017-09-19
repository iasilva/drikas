<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 07/09/2017
 * Time: 13:46
 */

namespace App\Controller;


use App\Mvc\Controller;

class StaticController extends Controller
{
    public function index()
    {
        echo "Welcome to the statics Pages";
    }

    public function parceria()
    {
        $this->view->setTitle("Seja um parceiro Drikas. ");
        $this->view->render('Static/parceria');
    }

    public function contato()
    {
        $this->view->setTitle("Fale com a Drikas. ");
        $this->view->render('Static/contato');
    }
    public function politicaDePrivacidade(){
        $this->view->setTitle("Política de privacidade da Drika's");
        $this->view->render('Static/politica-de-privacidade');
    }
}