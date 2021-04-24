<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function loginForm()
    {
        return view('login.login');
    }
    public function doLogin(Request $request)
    {
        return view('homes.adminHome', ['name' => $request->name]);
    }
}
