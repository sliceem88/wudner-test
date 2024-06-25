<?php

namespace App\Controllers;

class BaseController
{
    public function index()
    {
        (response()->json(['test' => 'test']));
    }
}
