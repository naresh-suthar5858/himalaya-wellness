<?php

namespace App\Http\Controllers\himalaya;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryProductController extends Controller
{
    public function showProduct($id)
    {
        $categories = Category::where('id',$id)->with('products')->get();

        // dd($categories);

        return view('himalaya.caregory-product' , compact('categories'));
    }
}
