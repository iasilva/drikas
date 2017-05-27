<?php


/**
 * Description of SuccessMessage
 *
 * @author Ivan Alves da Silva
 */
namespace Thirday\Messages;

class SuccessMessage extends \Thirday\Messages\iMessage {
    public function getMessage() {
        $html="<div class=\"alert alert-success\" role=\"alert\">";
        $html.="<strong><span class=\"glyphicon glyphicon-thumbs-up\"></span> </strong>";
        $html.= $this->message."</div>";
        return $html;
    }
}
