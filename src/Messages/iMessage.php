<?php

/**
 * Description of iMessage
 *
 * @author Ivan Alves da Silva
 */
namespace Thirday\Messages;
abstract class iMessage {
    protected $message;
    abstract function getMessage();
    public function setInformation($text){
        $this->message=$text;
    }
}
