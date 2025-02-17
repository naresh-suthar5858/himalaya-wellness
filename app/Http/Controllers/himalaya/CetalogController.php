<?php

namespace App\Http\Controllers\himalaya;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CetalogController extends Controller
{
    public function show(Request $request)
    {
        $request->validate(
            [
                'keyword'=>'required'
            ]
            );
        $products = Product::where('name' , 'LIKE' , '%'.$request->keyword.'%')->get();
        // dd($products);

        return view('himalaya.catalog' , compact('products'));

    }
}
