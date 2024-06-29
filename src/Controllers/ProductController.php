<?php

namespace App\Controllers;

use App\Models\Product;
use Leaf\Http\Request;

class CreateProductController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        $formsData = Request::params();

        try {
            Product::create($formsData);

            return response()->json([
                'data' => [],
                'errorStatus' => false,
                'message' => 'Product created successfully',
            ]);
        } catch (\Throwable) {
            return response()->json([
                'data' => [],
                'errorStatus' => true,
                'message' => 'Error on product creation',
            ]);
        }
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
