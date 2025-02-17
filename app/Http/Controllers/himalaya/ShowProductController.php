<?php

namespace App\Http\Controllers\himalaya;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowProductController extends Controller
{
    public function showDetail($id)
    {
        $product = Product::findOrFail($id);

        return view('himalaya.productdetail',compact('product'));
    }
}
