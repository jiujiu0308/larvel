<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\admin\Product\Product;
use Illuminate\Http\Request;

class FrontProductController extends Controller
{
    public function productlist()
    {
        return response()->json(Product::all());
    }
}
