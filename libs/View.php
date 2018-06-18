<?php

/**
 * Base view class.
 *
 * Developer: Lakmal Silva
 */
class View
{

    /**
     * Render template file.
     * @param $name string
     */
    public function render($name)
    {
        require "views/" . $name . ".php";
    }
}