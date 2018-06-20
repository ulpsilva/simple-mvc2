<?php

/**
 * Helper class
 *
 * Developer: Lakmal Silva
 */
class Helper
{

    /**
     * Redirect wrapper function
     * @param $path string
     */
    public static function redirect($path = "")
    {
        header("Location: " . URL . $path);
    }

    /**
     * Redirect guest users
     * @param $path string
     */
    public static function guestRedirect($path = "")
    {
        if (!Session::isLogin()) {
            self::redirect($path);
        }
    }

    /**
     * Redirect logged in users
     * @param $path string
     */
    public static function userRedirect($path = "")
    {
        if (Session::getCurrentUser() && Session::getCurrentUser()->role == "user") {
            self::redirect($path);
        }
    }

    /**
     * Redirect logged in admins
     * @param $path string
     */
    public static function adminRedirect($path = "")
    {
        if (Session::getCurrentUser() && Session::getCurrentUser()->role == "admin") {
            self::redirect($path);
        }
    }
}