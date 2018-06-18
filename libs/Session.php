<?php

/**
 * Session helper class
 *
 * Developer: Lakmal Silva
 */
class Session
{

    /**
     * Create flash array and remove old flash values
     */
    function __construct()
    {
        session_start();

        if (!isset($_SESSION['is_login'])) {
            $_SESSION['is_login'] = false;
        }

        if (isset($_SESSION['flash'])) {
            foreach ($_SESSION['flash'] as $name => $value) {
                if ($value['flash_count'] == 0) {
                    $_SESSION['flash'][$name]['flash_count'] = 1;
                } else {
                    unset($_SESSION['flash'][$name]);
                }
            }
        } else {
            $_SESSION['flash'] = array();
        }
    }

    /**
     * Add values to flash array
     * @param $name string
     * @param $value string
     */
    public static function addFlash($name, $value)
    {
        $_SESSION['flash'][$name] = [
            "flash_count" => 0,
            "value" => $value
        ];
    }

    /**
     * Get flash value by its name
     * @param $name string
     * @return string|bool
     */
    public static function getFlash($name)
    {
        if (isset($_SESSION['flash'][$name])) {
            return $_SESSION['flash'][$name]['value'];
        } else {
            return false;
        }
    }

    /**
     * Check flash value by its name
     * @param $name string
     * @return bool
     */
    public static function checkFlash($name)
    {
        return isset($_SESSION['flash'][$name]);
    }

    /**
     * Saving user object in session
     * @param $user UserModel
     */
    public static function login($user)
    {
        $_SESSION['is_login'] = true;
        $_SESSION['current_user'] = $user;
    }

    /**
     * check is user login
     * @return bool
     */
    public static function isLogin()
    {
        return $_SESSION['is_login'];
    }

    /**
     * Get current user
     * @return UserModel
     */
    public static function getCurrentUser()
    {
        return $_SESSION['current_user'];
    }

    /**
     * Unset session when user logout
     */
    public static function logout()
    {
        $_SESSION['is_login'] = false;
        unset($_SESSION['current_user']);
    }
}