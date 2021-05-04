<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shop;
use App\Models\customer;
use App\Models\admin;
use App\Models\content;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function save( Request $request){
        // return $request->tab;
        if($request->tab=="one")
        {
              $request->validate([
            'ovog'=>'required',
            'name'=>'required',
            'email'=>'required|email|unique:customers,email',
            'phone'=>'required',
            'register'=>'required',
            'address'=>'required',
            'password'=>'required|min:5|max:12',
            'birthdate'=>'required',
            'gender'=>'required'
        ]);
            $customer = new customer();
            $customer->ovog = $request->ovog;
            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->email = $request->email;
            $customer->gender = $request->gender;
            $customer->birthdate = $request->birthdate;
            $customer->register = $request->register;
            $customer->password = Hash::make($request->password);
            $customer->phone = $request->phone;

            $save = $customer->save();

            if($save)
            {
                return back()->with('success', 'Амжилттай бүртгэгдлээ');
            }else {
                return back()->with('fail', 'Алдаа гарлаа дахин оролдоно уу');
            }
        }
        else if($request->tab=="two") {
            $request->validate([
            'name2'=>'required',
            'email2'=>'required|email|unique:shops,email',
            'phone2'=>'required',
            'address2'=>'required',
            'password2'=>'required|min:5|max:12',
            ]);
            
            $shop = new shop();
            $shop->name = $request->name2;
            $shop->address = $request->address2;
            $shop->email = $request->email2;
            $shop->password = Hash::make($request->password2);
            $shop->phone = $request->phone2;

            $save = $shop->save();

            if($save)
            {
                return back()->with('success', 'Амжилттай бүртгэгдлээ');
            }else {
                return back()->with('fail', 'Алдаа гарлаа дахин оролдоно уу');
            }
        }
    }
    function check(Request $request){
        // return $request->input();
        $request->validate([
            $request->validate([
                'email'=>'required',
                'password'=>'required|min:5|max:12'
            ])
        ]);
        if($request->loginType == "customer")
        {
            $customerInfo = customer::where('email', '=', $request->email)->first();
            if(!$customerInfo)
            {
                return back()->with('fail', 'Таны майл хаяг буруу байна.');
            }
            else {
                if(Hash::check($request->password, $customerInfo->password)){
                    $request->session()->put('LoggedCustomer', $customerInfo->id);
                    return redirect('customer/dashboard');
                }
                else {
                    return back()->with('fail', 'Таны нууц үг буруу байна.');
                }
            }
        }
        elseif ($request->loginType == "shop") {
              $shopInfo = shop::where('email', '=', $request->email)->first();
            if(!$shopInfo)
            {
                return back()->with('fail', 'Таны майл хаяг буруу байна.');
            }
            else {
                if(Hash::check($request->password, $shopInfo->password)){
                    $request->session()->put('LoggedShop', $shopInfo->id);
                    return redirect('shop/dashboard');
                }
                else {
                    return back()->with('fail', 'Таны нууц үг буруу байна.');
                }
            }
        }
        elseif ($request->loginType == "admin") {
             $adminInfo = admin::where('email', '=', $request->email)->first();
            if(!$adminInfo)
            {
                return back()->with('fail', 'Таны майл хаяг буруу байна.');
            }
            else {
                if($request->password==$adminInfo->password){
                    $request->session()->put('LoggedAdmin', $adminInfo->id);
                    return redirect('admin/dashboard');
                }
                else {
                    return back()->with('fail', 'Таны нууц үг буруу байна.');
                }
            }
        }
    }
    function dashboardAdmin(){
       $data = ['LoggedInfo'=>admin::where('id', '=', session('LoggedAdmin'))->first()];
        return view('admin.dashboard', $data );

    }
    function dashboardCustomer(){
         $data = ['LoggedInfo'=>customer::where('id', '=', session('LoggedCustomer'))->first()];
        return view('customer.dashboard', $data);
    }
    function searchContent(Request $request){
        $data = ['LoggedInfo'=>content::where('name','LIKE','%'.$request->search.'%')
                                        ->orwhere('type','LIKE','%'.$request->search.'%')
                                        ->orwhere('author','LIKE','%'.$request->search.'%')
                                        ->orwhere('producer','LIKE','%'.$request->search.'%')
                                        ->get()];
        //$data = content::where('name','LIKE','%'.$request->search.'%')->get();
        return view('customer.search', $data);
    }
    function dashboardShop(){
         $data = ['LoggedInfo'=>shop::where('id', '=', session('LoggedShop'))->first()];
        return view('shop.dashboard', $data);
    }
    function addContent(){
        return view('shop.addContent');
    }
    function myContent(){
        return view('shop.myContent');
    }
    function logOut(){
        if(Session()->has('LoggedCustomer'))
        {
            session()->pull('LoggedCustomer');
            return redirect('/auth/login');
        }
        elseif (Session()->has('LoggedAdmin')) {
             session()->pull('LoggedAdmin');
            return redirect('/auth/login');
        }
        else  if(Session()->has('LoggedShop')){
             session()->pull('LoggedShop');
            return redirect('/auth/login');
        }
    }
}