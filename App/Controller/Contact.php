<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 16/09/2017
 * Time: 12:41
 */

namespace App\Controller;


use App\Mvc\Controller;

class Contact extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function sendContactAjax(){
        sleep(3);
        echo "<table class='table table-bordered'><tr>";
        echo "<th>Nome</th><th>Email</th><th>Mensagem</th></tr>";
        echo "<tr><td>".$_POST['form-contact-name']."</td>";
        echo "<td>".$_POST['form-contact-email']."</td>";
        echo "<td>".$_POST['form-contact-mensagem']."</td></tr>";

        echo "</table>";



    }

}