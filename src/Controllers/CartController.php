<?php

namespace App\Controllers;

use App\Models\Cart;
use Leaf\Http\Request;

class CartController extends BaseController
{
    private ?Cart $cartHandler;

    public function __construct()
    {
        parent::__construct();
        $this->cartHandler = new Cart();
    }

    public function get()
    {
        $cartData = getJsonRequest(Request::params());
        [$total, $products, $rules] = $this->cartHandler->process($cartData);

        return response()->json([
            'data' => [
                'totalPrice' => $total,
                'products' => $products->toArray(),
                'rules' => $rules->toArray(),
            ],
            'errorStatus' => false,
            'message' => '',
        ]);
    }
}
