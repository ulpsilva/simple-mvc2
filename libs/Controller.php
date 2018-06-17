<?php

/**
 * Base controller class.
 *
 * Developer: Lakmal Silva
 */
class Controller {

    function __construct() {
        $this->view = new View();
    }
}