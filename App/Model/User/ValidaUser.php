<?php

namespace App\Model\User;

use App\Model\User\UserModel;
use Thirday\Valida\Validacao;

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
        'bairro', 'birth', 'municipio_id'
    );
    //Mensagens de erros encontradas na validação, armazenados no array
    private $errors = [];
    // Alertas, não inpeditivos ao cadastro
    private $alerts = [];
    // Instancia de Thirday\Valida\Validacao;
    private $valida;

    public function __construct() {
        $this->valida = new Validacao;
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
            $this->errors[] = "Campo não disponível para validação.";
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
         $this->errors[] = "Classe de validação ainda não desenvolvida.";
    }

    private function validaSexo($sexo) {
       $this->errors[] = "Classe de validação ainda não desenvolvida.";
    }

    private function validaEmail($email) {
        $this->realValida('email', $email);
        //Preparar mais validações específicas - Verificar se email já existe
    }

    private function validaSenha($senha) {
       $this->errors[] = "Classe de validação ainda não desenvolvida.";
    }

    private function validaLogradouro($logradouro) {
       $this->errors[] = "Classe de validação ainda não desenvolvida.";
    }

    private function validaNumero($numero = 'SN') {
        $this->errors[] = "Classe de validação ainda não desenvolvida.";
    }

    private function validaBairro($bairro) {
        $this->errors[] = "Classe de validação ainda não desenvolvida.";
    }

    private function validaMunicipio_id($municipio) {
        $this->errors[] = "Classe de validação ainda não desenvolvida.";
    }

    private function validaBirth($birth) {
       $this->errors[] = "Classe de validação ainda não desenvolvida.";
    }

    private function returns() {
        return array($this->errors, $this->alerts);
    }
    /**   
     * @param string $campo - 
     * @param string $valor - Valor recebido para validação
     */
    private function realValida($campo,$valor){
         try {
            $this->valida->validar($campo,$valor);
        } catch (\Exception $e) {
            $this->errors[]=$e->getMessage();
        }
    }

}
