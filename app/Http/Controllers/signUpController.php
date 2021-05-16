<?php

// * B180910069 Амарбат
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class signUpController extends Controller
{
    public function signUp()
    {
        return view('signUp.signUp');
    }
    public function doSignUp(Request $request)
    {

        if ($request->tab == 'one') {
            $validated = $request->validate([
                'password' => 'required',
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'register' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'birthdate' => 'required',
            ]);
            $request = $request->all();
            DB::table('customer')->insert([
                'ovog' => $request['ovog'],
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'register' => $request['register'],
                'address' => $request['address'],
                'password' => $request['password'],
                'gender' => $request['gender'],
                'birthdate' => $request['birthdate']
            ]);
            return redirect()->back()->withSuccess("Амжилттай бүртгэгдлээ.");
        } else if ($request->tab == 'two') {
            $validated = $request->validate([
                'password2' => 'required',
                'name2' => 'required',
                'email2' => 'required',
                'phone2' => 'required',
                'address2' => 'required',
            ]);
            $request = $request->all();
            DB::table('shop')->insert([
                'name' => $request['name2'],
                'email' => $request['email2'],
                'phone' => $request['phone2'],
                'address' => $request['address2'],
                'password' => $request['password2'],
            ]);
            return redirect()->back()->withSuccess("Амжилттай бүртгэгдлээ.");
        }
    }
}