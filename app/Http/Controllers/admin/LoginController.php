<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user(); // Get the authenticated user

            // Check if the user is an admin
            if ($user->is_admin == 1) {
                return redirect()->route('home'); // Redirect to the home route for admin
            } else {
                Auth::logout(); // Logout the user
                return redirect()->back()->with('error', 'Access denied: You are not authorized to access this area.');
            }
        } else {
            return redirect()->back()->with('error', 'data does not match');
        }

        // dd($request->all());
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
