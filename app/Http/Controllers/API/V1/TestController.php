<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return response()->json(['message' => 'API is working!'], 200);
    }
}
