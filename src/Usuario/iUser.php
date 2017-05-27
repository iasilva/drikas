<?php

namespace Thirday\Usuario;

use SimpleCrud\SimpleCrud;

/**
 * Interface da classe usuário, detem os dados comuns e retorna o usuário básico.
 *
 * @author Ivan
 */
abstract class iUser
{
    protected $nome;
    protected $id;
    protected $email;
    protected $telefone;
    protected $tipo;
    protected $created_at;
    protected $updated_at;

    /**
     * Método implementa o básico do cadastro do usuário e deve ser complementado
     * por cada classe filha.
     */
    protected function cadastraUsuario()
    {
        $a                = new \DateTime;
        $this->created_at = $a->setTimezone(new \DateTimeZone('America/Sao_Paulo'))->format('Y-m-d H:i:s');
        $db               = new SimpleCrud(\Database::conexao());
        
        $this->id        = $db->usuario
            ->insert()
            ->data([
                'nome' => $this->nome,
                'email' => $this->email,
                'tel'=> $this->telefone,
                'tipo'=> $this->tipo,
                'created_at'=> $this->created_at
            ])
            ->run();
    }

    abstract protected function validaUsuario();

    public function getUsuario()
    {
        $usuario = ["nome" => $this->nome, "id" => $this->id, "email" => $this->email,
            "tipo" => $this->tipo];
        return $usuario;
    }

    /**
     * Faz a validação básica dos campos quanto a estrutura e forma dos dados
     */
    protected function validaFormaDadosBasicos()
    {
        $valida = new \Thirday\Valida\Validacao;
        $valida->validar("email", $this->email);
        $valida->validar('nome', $this->nome);
    }
}