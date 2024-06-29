<?php

namespace App\Controllers;

use App\Models\Product;
use Leaf\Http\Request;

class CartController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        return response()->json([
            'data' => [...Product::all()->toArray()],
            'errorStatus' => false,
            'message' => '',
        ]);
    }
}
