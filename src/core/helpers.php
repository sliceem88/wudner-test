<?php

if (! function_exists('dd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @return void
     */
    function dd($var): void
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
        die();
    }
}
