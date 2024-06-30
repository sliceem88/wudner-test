<?php

namespace App\Controllers;

use App\Models\Product;
use Leaf\Http\Request;
use App\Models\Cart;

class CartController extends BaseController
{
    private ?Cart $cartHandler;

    public function __construct()
    {
        $this->cartHandler = new Cart();
    }

    public function get()
    {
        $cartData = getJsonRequest(Request::params());
        $cart = $this->cartHandler->process($cartData);

        return response()->json([
            'data' => [...Product::all()->toArray()],
            'errorStatus' => false,
            'message' => '',
        ]);
    }
}
