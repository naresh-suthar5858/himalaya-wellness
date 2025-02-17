<?php

namespace App\Http\Controllers\himalaya;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function sendmessage(Request $request)
    {
        $enquiry = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required',
        ]);

        $send = Enquiry::create($enquiry);

        if($send)
        {
            return redirect()->route('homepage');
        }
        else
        {
            return redirect()->back();

        }

        // dd($request->all());
    }
}
