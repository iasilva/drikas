<?php

namespace App\Mvc;

/**
 * Todos os nossos controllers devem herdar esse controller
 */
abstract class Controller {

    protected $view;

    public function __construct() {
        $this->view = new View;
    }

}
