<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        validator($request->all(), [
            'email' => ['required', 'email'],
            'password' => 'required'
        ])->validate();

        if (auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('admin-home')->with('message', 'Welcome ' . auth()->guard('admin')->user()->name);
        }

        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect()->route('login');
    }
}
