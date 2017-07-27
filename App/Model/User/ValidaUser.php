<?php

namespace App\Model\User;

use App\Model\User\UserModel;
use Thirday\Valida\Validacao;
use App\Model\User\UserRepository;
use App\Model\Endereco\MunicipioRepository;

/**
 * Classe responsável por toda validação de dados para cadastro de usuário *
 * @author Ivan Alves da Silva
 * @copyright (c) 2017, Ivan Alves da Silva
 * @version alpha 0.1
 */
class ValidaUser {

    private $camposValidos = array(
        'name', 'cpf', 'sexo', 'email',
        'senha', 'logradouro', 'numero',
        'bairro', 'birth', 'municipio_id',
        'phone','cep'
    );
    //Mensagens de erros encontradas na validação, armazenados no array
    private $errors = [];
    // Alertas, não inpeditivos ao cadastro
    private $alerts = [];
    // Instancia de Thirday\Valida\Validacao;
    private $valida;
    private $pdo;

    public function __construct() {
        $this->valida = new Validacao;
        $this->pdo = \Database::conexao();
    }

    /**
     * Método avalia todos os itens necessários de um classe de usuário e 
     * veifíca se os dados preenchidos são válidos.
     * @param UserModel $user - Instância de UserModel preenchida
     * @return array (errors[],alerts[]).
     */
    public function validaAll(UserModel $user) {

        foreach ($this->camposValidos as $campo) {
            $metodo = 'valida' . ucfirst($campo);
            $get = "get" . ucfirst($campo);
            call_user_func(array($this, $metodo), call_user_func(array($user, $get)));
            echo "<br>";
        }




        return $this->returns();
    }

    /**
     * Método para validação individual dos campos referentes ao usuário
     * @param string $campo - Item a ser validado dentro de um usuario<br>
     * Valores válidos para campo: <br><b>  'name', 'cpf', 'sexo', 'email',
      'senha', 'logradouro', 'numero', 'bairro', 'birth', 'municipio_id'<b><br>
     * @param string $valor - Valor a ser avaliado se é considerado um valor aceitável ou não.<br>
     * @return array (errors[],alerts[]).
     */
    public function valida($campo, $valor) {

        if (in_array($campo, $this->camposValidos)) {
            $metodo = 'valida' . ucfirst($campo);
            /**
             * Chama o método correto conforme o parâmetro $campo
             */
            call_user_func(array($this, $metodo), $valor);
        } else {
            $this->errors[] = "Campo $campo não disponível para validação.";
        }

        return $this->returns();
    }

    /**
     * Valida o campo nome
     * @param string $name
     */
    private function validaName($name) {
        $this->realValida('nome', $name);
    }

    private function validaCpf($cpf) {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        $userRepository = new UserRepository($this->pdo);
        if ($userRepository->getUserByCPF($cpf)) {
            $this->errors[] = "Usuário já cadastrado no sistema.<br> "
                    . "<a href='./?page=user&action=login'>Entrar</a> ou "
                    . "<a href='./?page=user&action=rememberPassword'>Alterar senha</a>";
        } else {
            $this->realValida('cpf', $cpf);
        }
    }

    private function validaSexo($sexo) {
        if (!($sexo === 'M' || $sexo === 'F')) {
             $this->errors[] = "Valor '$sexo' para campo 'sexo' não previsto no sistema.";           
        }
    }

    private function validaEmail($email) {
        $userRepository = new UserRepository($this->pdo);
        if ($userRepository->getUser($email)) {
            $this->errors[] = "Usuário já cadastrado no sistema.<br> "
                    . "<a href='./?page=user&action=login'>Entrar</a> ou "
                    . "<a href='./?page=user&action=rememberPassword'>Alterar senha</a>";
        } else {
            $this->realValida('email', $email);
        }
    }

    private function validaSenha($senha) {
        $this->realValida('senha', $senha);
    }

    private function validaPhone($phone) {
        $this->realValida('phone', $phone);
    }

    private function validaLogradouro($logradouro) {
        $this->realValida('logradouro', $logradouro);
    }

    private function validaNumero($numero) {
        $this->realValida('enderecoNumero', $numero);
    }

    private function validaBairro($bairro) {
        $this->realValida('bairro', $bairro);
    }
    private function validaCep($cep) {
        if(empty($cep) || $cep ==='' || (strlen($cep) < 9)){
            $this->errors[]="Preencha com um CEP válido";
        }else{
            return true;
        }
    }

    private function validaMunicipio_id($municipio_id) {
        $municipio = new MunicipioRepository($this->pdo);
        if (!$municipio->getMunicipioById($municipio_id)) {
            $this->errors[] = "Código do município inexistente no banco de dados.";
        }
    }

    private function validaBirth($birth) {
        if (is_object($birth)) {
            $this->realValida('birth', $birth);
        } else {
            $birth = new \DateTime($birth);
            $this->realValida('birth', $birth);
        }
    }

    private function returns() {
        return array($this->errors, $this->alerts);
    }

    /**
     * @param string $campo - 
     * @param string $valor - Valor recebido para validação
     */
    private function realValida($campo, $valor) {
        try {
            $this->valida->validar($campo, $valor);
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
        }
    }

}
