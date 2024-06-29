<?php

namespace App\Controllers;

use Leaf\Http\Request as LeafRequest;
use App\Models\Product;

class CreateProductController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $formsData = LeafRequest::params();
        
        try {
            Product::create($formsData);

            return response()->json([
                'data' => [], 
                'errorStatus' => false,
                'message' => 'Product created successfully'
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'data' => [], 
                'errorStatus' => true, 
                'message' => 'Error on product creation'
            ]);
        }
    }
}
