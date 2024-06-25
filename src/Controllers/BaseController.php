<?php

namespace App\Controllers;

use Leaf\Http\Request;

class BaseController {
    public function index() {
        (response()->json(['test' => 'test']));
    }
}