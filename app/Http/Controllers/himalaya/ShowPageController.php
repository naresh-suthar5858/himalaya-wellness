<?php

namespace App\Http\Controllers\himalaya;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowPageController extends Controller
{
    public function showPage($url_key)
    {

        $page = Page::where('url_key',$url_key)->first();

        return view('himalaya.page' , compact('page'));
        // dd($url_key);
    }
}
