<?php

/**
 * Error controller
 *
 * Developer: Lakmal Silva
 */
class ErrorController extends Controller
{

    function __construct()
    {
        Parent::__construct();
    }

    /**
     * 404 page not found error.
     */
    function indexAction()
    {
        $this->view->render("error/error404");
    }
}