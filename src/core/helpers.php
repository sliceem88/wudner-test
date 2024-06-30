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


if (! function_exists('getJsonRequest')) {
    /**
     * Transform request JSON string, remove special characters and return decoded data
     */
    function getJsonRequest(array $var): array
    {
        return json_decode(htmlspecialchars_decode(current($var)), true);
    }
}
