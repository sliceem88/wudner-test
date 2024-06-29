<?php

namespace App\Controllers;

use Interfaces\CreationableInterface;
use Interfaces\GettableInterface;

abstract class BaseController implements CreationableInterface, GettableInterface
{
    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Headers: Content-Type, Accept');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With");
    }
}
