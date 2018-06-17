<?php

/**
 * Index page controller
 *
 * Developer: Lakmal Silva
 */
class IndexController extends Controller {

    function __construct() {
        Parent::__construct();
    }

    /**
     * Index page
     */
    function indexAction() {
        $this->view->render("index/index");
    }
}