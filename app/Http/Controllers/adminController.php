<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\customer;
use App\Models\shop;
use Illuminate\Http\Request;

class adminController extends Controller
{
    function adminHome()
    {
        $data = ['LoggedInfo' => admin::where('id', '=', session('LoggedAdmin'))->first()];
        return view('admin.home', $data);
    }
    function shopAccounts()
    {
        $shops = shop::get();
        return view('admin.shops', compact('shops'));
    }
    function customerAccounts()
    {
        $customers = customer::get();
        return view('admin.customers', compact('customers'));
    }
}
