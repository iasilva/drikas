<?php



/**
 * Description of InfoMessage
 *
 * @author ivana
 */
namespace Thirday\Messages;

class InfoMessage extends \Thirday\Messages\iMessage{
     public function getMessage() {
        $html="<div class=\"alert alert-info\" role=\"alert\">";
        $html.="<strong><span class=\"glyphicon glyphicon-pushpin\"></span> </strong>";
        $html.= $this->message."</div>";
        return $html;
    }
}
