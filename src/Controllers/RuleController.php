<?php

namespace App\Controllers;

use App\Models\Rule;
use Leaf\Http\Request;
use App\Interfaces\CreationableInterface;

class RuleController extends BaseController implements CreationableInterface
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
                'message' => 'Rule created successfully',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'data' => [],
                'errorStatus' => true,
                'message' => 'Error on rule creation',
            ]);
        }
    }

    public function get()
    {
        return response()->json([
            'data' => [...Rule::all()->toArray()],
            'errorStatus' => false,
            'message' => '',
        ]);
    }
}
