<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlertMessage
 *
 * @author ivana
 */

namespace Thirday\Messages;
class AlertMessage extends \Thirday\Messages\iMessage {
    public function getMessage() {
        $html="<div class=\"alert alert-warning\" role=\"alert\">";
        $html.="<strong><span class=\"glyphicon glyphicon-bullhorn\"></span> </strong>";
        $html.= $this->message."</div>";
        return $html;
    }
}
