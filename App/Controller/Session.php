<?php

namespace App\Controller;

use App\Mvc\Controller;
use App\Model\Session\SessionModel as ses;
use App\Model\Session\SessionRepository as sesRep;
use App\Model\User\UserModel as user;
use \Thirday\Request\RequestFactory as request;
use App\Model\User\UserRepository as userRep;
use \App\Model\Session\LoginSession;
use App\Model\Session\RegisterLocaleSession as SessaoLocal;
use Filipac\Ip;

/**
 * Responsável por administrar a criação da seção no banco de dados
 *
 * @author Ivan Alves da Silva
 */
class Session extends Controller {

    private $pdo;
    private $sessionId;

    public function __construct($pdo) {
        parent::__construct();
        $this->pdo = $pdo;
        $this->sessionId = session_id();
    }

    /**
     * Controle básico das sessões
     * Caso não tenha uma sessão, salva a sessão no Banco de dados e retorna verdadeiro.
     * Se tiver uma sessão, ele encaminha para que sessão seja monitorada
     */
    public function register() {
        $sesRep = new sesRep($this->pdo);
        if (!$sessaoAtual = $sesRep->getSessionById($this->sessionId)) {
            return $this->pdoSessionRegister();
        } else {
            $this->monitoringSession($sessaoAtual);
        }
    }

    /**
     * Providencia para salvamento da presente sessão no banco de dados
     */
    private function pdoSessionRegister() {
        $ses = new ses;
        $agente = $this->configAtualAgent();
        $ses->setId($this->sessionId);
        if (isset($_SESSION['user']['id'])) {
            $ses->setUser_id($_SESSION['user']['id']);
        }
        $ses->setBrowser($agente->browsername);
        $ses->setDevice($agente->type);
        $ses->setSo($agente->osname);
        $ses->setIp(Ip::get());
        try {
            $ses->save($this->pdo);
            return true;
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Utiliza a classe parseUserAgentStringClass para obter as informações do agente 
     * do usuário
     */
    private function configAtualAgent() {
        $parser = new \parseUserAgentStringClass(); // This creates a new instance of this class object.
        $parser->includeAndroidName = true;
        $parser->includeWindowsName = true;
        $parser->includeMacOSName = true;
        $parser->treatClonesAsTheRealThing = true;
        $parser->treatProjectSpartanInternetExplorerLikeLegacyInternetExplorer = true;
        $strAgent = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT');
        @$parser->parseUserAgentString($strAgent);
        return $parser;
    }

    /**
     * Verifica a sessão existente e monitora, sendo dada como verdade
     * @param SessionModel $session
     */
    private function monitoringSession(ses $session) {
        $agente = $this->configAtualAgent();
        if ($agente->browsername === $session->getBrowser() && Ip::get() === $session->getIp()) {
            // Se o browser e o IP, além do ID da sessão forem o mesmo
            //Deve comparar o tempo de sessão nesse caso 2Dias.
            echo "Morrendo aqui.";
        } else {
            $this->sessionClose($session);
        }
    }

    public function logOut() {
        $sesRep = new sesRep($this->pdo);
        if (!$sessaoAtual = $sesRep->getSessionById($this->sessionId)) {
            unset($_SESSION['user']);
        } else {
            $this->sessionClose($sessaoAtual);
        }
          $dir=DIR;            
        header("Location:$dir");
    }
    
    public function processaLogin(){
        $post= new request('post');
        $userForRegister= new user;
        $userRegistered= new userRep($this->pdo);
        $userForRegister->setEmail($post->captura('email'));
        $userForRegister->setSenha($post->captura('senha'));
        if(!$userInBd=$userRegistered->getUser($userForRegister->getEmail())){
            echo 'Usuário NÃO existe';
        }else{
            $login=new LoginSession($userForRegister, $userInBd);            
            if($login->logar()){
               SessaoLocal::register($userInBd);
               $this->register();
            }else{
                echo 'Senha não confere';
            }
        }
            
        
    }

    /**
     * Encerra sessão no BD e a sessão user no $__SESSION e regenera o sessionId 
     * após o procedimento
     */
    private function sessionClose(ses $session) {
        $session->close($this->pdo); //Falta desenvolver esse método em SessionModel
        unset($_SESSION['user']);
        session_regenerate_id();
    }

}
