<?php

/**
 * Initiate controller and execute correct method by exploding url parameters.
 *
 * Developer: Lakmal Silva
 */
class Bootstrap
{

    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "index";
        $url = rtrim($url, "/");
        $url = explode("/", $url);
        $url = array_filter($url, function ($value) {
            return $value !== '';
        });

        $controllerClass = array_shift($url) . "Controller";
        $controllerFile = "controllers/" . $controllerClass . ".php";

        if (file_exists($controllerFile)) {
            require $controllerFile;
        } else {
            Helper::redirect("error");
        }
        $controller = new $controllerClass;
        if (isset($url[0]) && method_exists($controller, $url[0] . "Action")) {
            $method = array_shift($url) . "Action";
        } else if (!isset($url[0])) {
            $method = "indexAction";
        } else {
            Helper::redirect("error");
        }

        if (isset($url[0])) {
            $controller->{$method}(...$url);
        } else if (method_exists($controller, $method)) {
            $controller->{$method}();
        } else {
            Helper::redirect("error");
        }
    }
}