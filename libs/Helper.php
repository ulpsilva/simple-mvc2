<?php

/**
 * Helper class
 *
 * Developer: Lakmal Silva
 */
class Helper {

    /**
     * Redirect wrapper function
     * @param $path string
     */
    public static function redirect($path = "") {
        header("Location: " . URL . $path);
    }
}