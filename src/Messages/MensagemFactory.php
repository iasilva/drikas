<?php


/**
 * Description of MensagemFactory
 *
 * @author Ivan Alves da Silva
 */
namespace Thirday\Messages;
class MensagemFactory extends \Thirday\Messages\Mensagem {
     public function geraMensagem(\Thirday\Messages\iMessage $mensagemClass) {
      $mensagemClass->setInformation($this->mensagem);
      echo $mensagemClass->getMessage();  
    }
}
