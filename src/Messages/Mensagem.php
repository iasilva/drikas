<?php


/**
 * Description of Mensagem
 *
 * @author Ivan Alves da Silva
 */
namespace Thirday\Messages;

abstract class Mensagem {
    protected $mensagem;
    abstract function geraMensagem(\Thirday\Messages\iMessage $mensagemClass);
    
    /**
     * 
     * @param iMessage $tipoMensagem - instancia de uma das classes de mensagens
     * @param string $mensagem - Mensagem a ser exibida
     */
    public function exibeMensagem($tipoMensagem,$mensagem){
        $this->mensagem=$mensagem;
        $this->geraMensagem($tipoMensagem);
    }
}
