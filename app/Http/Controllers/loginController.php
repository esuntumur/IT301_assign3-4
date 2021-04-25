<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class loginController extends Controller
{
    public function loginForm()
    {
        return view('login.login');
    }
    public function doLogin(Request $request)
    {
        // TODO 1 => DB select checking
        $validated = $request->validate([
            'password' => 'required',
            'name' => 'required',
        ]);
        $exist = DB::table($request->loginType)->get();
        foreach ($exist as $item) {
            if ($item->name == $request->name && $item->password == $request->password) {
                if ($request->loginType == 'admin') {
                    return view('layout.masterAdmin', ['name' => $request->name, 'password' => $request->password]);
                } else if ($request->loginType == 'customer') {
                    return view('layout.masterCustomer', ['name' => $request->name, 'password' => $request->password]);
                } else if ($request->loginType == 'shop') {
                    return view('layout.masterShop', ['name' => $request->name, 'password' => $request->password]);
                }
            } else return redirect()->back()->withSuccess("Таны оруулсан хэрэглэгч байхгүй байна.");
        }
    }
}