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
        switch ($request->loginType) {
            case 'admin':
                $exist = DB::table('admin')->get();
                foreach ($exist as $item) {
                    if ($item->name == $request->name && $item->password == $request->password) {
                        return view('homes.adminHome', ['name' => $request->name, 'password' => $request->password]);
                    } else return redirect()->back()->withSuccess("Таны оруулсан хэрэглэгч байхгүй байна.");
                }
                break;
            case 'customer':
                $exist = DB::table('customer')->get();
                foreach ($exist as $item) {
                    if ($item->name == $request->name && $item->password == $request->password) {
                        return view('homes.adminHome', ['name' => $request->name, 'password' => $request->password]);
                    } else return redirect()->back()->withSuccess("Таны оруулсан хэрэглэгч байхгүй байна.");
                }
                break;
            case 'shop':
                $exist = DB::table('shops')->get();
                foreach ($exist as $item) {
                    if ($item->name == $request->name && $item->password == $request->password) {
                        return view('homes.adminHome', ['name' => $request->name, 'password' => $request->password]);
                    } else return redirect()->back()->withSuccess("Таны оруулсан хэрэглэгч байхгүй байна.");
                }
                break;
        }
    }
}