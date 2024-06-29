<?php

namespace App\Controllers;

use Leaf\Http\Request;
use App\Models\Rule;

class CreateRuleController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        $formsData = Request::params();
        
        try {
            Rule::create($formsData);

            return response()->json([
                'data' => [], 
                'errorStatus' => false,
                'message' => 'Rule created successfully'
            ]);

        } catch (\Throwable) {
            return response()->json([
                'data' => [], 
                'errorStatus' => true, 
                'message' => 'Error on rule creation'
            ]);
        }
    }

    public function get()
    {
        return response()->json([
            'data' => [...Rule::all()->toArray()], 
            'errorStatus' => false,
            'message' => ''
        ]);
    }
}
