<?php

namespace App\ Controller;

use App\Mvc\Controller;
use App\Model\Session\SessionModel as ses;
use App\Model\Session\SessionRepository as sesRep;
use App\Model\User\UserModel as user;
use Thirday\Request\RequestFactory as request;
use App\Model\User\UserRepository as userRep;
use App\Model\Session\LoginSession;
use App\Model\Session\RegisterLocaleSession as SessaoLocal;
use Filipac\Ip;

/**
 * Responsável por administrar a criação da seção no banco de dados
 * @author Ivan Alves da Silva
 */
class Session extends Controller
{

    private $pdo;
    private $sessionId;

    public

    function __construct($pdo)
    {
        parent::__construct();
        $this->pdo = $pdo;
        $this->sessionId = session_id();
    }

    /**
     * Controle básico das sessões
     * Caso não tenha uma sessão, salva a sessão no Banco de dados e retorna verdadeiro.
     * Se tiver uma sessão, ele encaminha para que sessão seja monitorada
     */
    public

    function register()
    {
        $sesRep = new sesRep($this->pdo);
        if (!$sessaoAtual = $sesRep->getSessionById($this->sessionId)) {
            // Antes de gerar uma nova sessão deve verificar se a sessão atual já está registrada, sem usuário
            $this->pdoSessionRegister();
            $this->monitoringSession($sesRep->getSessionById(session_id()));

        } else {
            if (isset($_SESSION['user']['id'])) {
                $sessaoAtual->setUser_id($_SESSION['user']['id']);
                $sessaoAtual->updateUser($this->pdo);
            }
            $this->monitoringSession($sessaoAtual);
        }
    }

    /**
     * Providencia para salvamento da presente sessão no banco de dados
     */
    private

    function pdoSessionRegister()
    {
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
    private

    function configAtualAgent()
    {
        $parser = new\ parseUserAgentStringClass(); // This creates a new instance of this class object.
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
    private

    function monitoringSession(ses $session)
    {
        $agente = $this->configAtualAgent();
        if ($agente->browsername === $session->getBrowser() && Ip::get() === $session->getIp()) {
            $now = new\ DateTime('now', new\ DateTimeZone('utc'));
            $createDate = $session->getCreated_at();
            $dif = $now->diff($createDate);
            if (($dif->h >= 2) || ($dif->d > 0) || (!isset($_SESSION['user']))) {
                $this->sessionClose();
                header("Location:./?page=user&action=login&error=invalidSession&next=pedido");
            } else {
                if (isset($_GET['origin']) && $_GET['origin'] === 'processPedido') {
                    header("Location:./?page=pedido");
                }
            }

        } else {
            $this->sessionClose();
        }
    }

    public

    function logOut()
    {
        $sesRep = new sesRep($this->pdo);
        if (!$sessaoAtual = $sesRep->getSessionById($this->sessionId)) {
            unset($_SESSION['user']);
        } else {
            $this->sessionClose();
        }
        header("Location:./ ");
    }

    /**
     *Responsável pelo processamento do login e criação da sessão
     */
    public function processaLogin()
    {
        $post = new request('post');
        $userForRegister = new user;
        $userRegistered = new userRep($this->pdo);
        $userForRegister->setEmail($post->captura('email'));
        $userForRegister->setSenha($post->captura('senha'));
        if (!$userInBd = $userRegistered->getUser($userForRegister->getEmail())) { //Verífica se o email não está cadastrado
            header("Location:./?page=user&action=login&error=user");
        } else {
            $login = new LoginSession($userForRegister, $userInBd);
            if ($login->logar()) {//Tenta logar
                SessaoLocal::register($userInBd);//Cria sessão local
                $this->register();  //Cria sessão no Banco de dados
                if (isset($_GET['next']) && $_GET['next'] === 'pedido') { //Verifica se o usuário está vindo de uma finalização de pedido
                    header("Location:./?page=pedido");
                } else {
                    if (isset($_SESSION['cart']) && $_SESSION['cart'] !== '' ) {
                        header("Location:./?page=cart");
                    }else{
                        header("Location:./?page=product");
                    }
                }
            } else {
                $this->sessionClose();
                header("Location:./?page=user&action=login&error=senha");
            }
        }


    }

    /**
     * Encerra sessão no BD e a sessão user no $__SESSION e regenera o sessionId
     * após o procedimento
     */
    private

    function sessionClose()
    {
        $sesRep = new sesRep($this->pdo);
        if ($sessaoAtual = $sesRep->getSessionById($this->sessionId)) {
            if (isset($_SESSION['user']['id'])) {
                $sessaoAtual->setUser_id($_SESSION['user']['id']);
                $sessaoAtual->updateUser($this->pdo);
            }
            $sessaoAtual->close($this->pdo);

        }
        unset($_SESSION['user']);
        session_regenerate_id();
    }

}