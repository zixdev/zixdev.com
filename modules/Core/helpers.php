<?php
/**
 * Created by PhpStorm.
 * User: badi
 * Date: 9/24/16
 * Time: 8:29 AM
 */

if (! function_exists('site')) {
    /**
     * Get the current for the application.
     * @param null $name
     * @return
     */
    function site($name = null)
    {
        return Site::current();
    }
}