<?php
/**
 * Description of errorMessage
 *
 * @author Ivan Alves da Silva
 */
namespace thirday\Messages;
class ErrorMessage extends \Thirday\Messages\iMessage {
    public function getMessage() {
        $html="<div class=\"alert alert-danger\" role=\"alert\">";
        $html.="<strong><span class=\"glyphicon glyphicon-alert\"></span> </strong>";
        $html.= $this->message."</div>";
        return $html;
    }
}
