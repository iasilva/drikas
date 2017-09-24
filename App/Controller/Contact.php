<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 16/09/2017
 * Time: 12:41
 */

namespace App\Controller;


use App\Mvc\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Thirday\Request\RequestFactory;

class Contact extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function sendContactAjax(){
        $post= new RequestFactory('post');
        $nome=$post->captura('form-contact-name');
        $email=$post->captura('form-contact-email');
        $mensagem=$post->captura('form-contact-mensagem');

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'br746.hostgator.com.br';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sac@peliculasdrikas.com.br';                 // SMTP username
            $mail->Password = '@Estevao2210';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->CharSet='utf8';

            //Recipients
            $mail->setFrom('sac@peliculasdrikas.com.br');
            $mail->addAddress('sac@peliculasdrikas.com.br');     // Add a recipient
            $mail->addReplyTo($email, $nome);
            $mail->addCC('ivan.alves@outlook.com');



            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Novo contato - '.date('d/m/Y').' - '.$nome;
            $mail->Body    = $mensagem;
            $mail->send();
            echo 'OK';
        } catch (Exception $e) {
            echo 'Messagem não pode ser enviada.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

    }


}