<?php

// * B180910069 Амарбат
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'email' => 'required',
        ]);
        // check user exists by name, pass
        $user = DB::table($request->loginType)->where('email', $request->email)
            ->where('password', $request->password)
            ->first();
        if ($user) {
            if ($user->email == $request->email && $user->password == $request->password) {
                $token = Str::random(60);
                DB::table($request->loginType)
                    ->where('email', $request->email)
                    ->update(["token" => $token]);
                // redirect view by login type (үйлчлүүлэгч, админ, дэлгүүр)
                switch ($request->loginType) {
                    case 'admin':
                        return view('layout.masterAdmin', ['user' => $user, 'token' => $token]);
                        break;
                    case 'customer':
                        return view('layout.masterCustomer', ['user' => $user, 'token' => $token]);
                        break;
                    case 'shop':
                        return view('layout.masterShop', ['user' => $user, 'token' => $token]);
                        break;
                    default:
                        return 'invalid user';
                        break;
                }
            }
        }
    }
}
// return redirect()->back()->withSuccess(" байхгүй байна.");