<?php
// * B170910031 Есөнтөмөр
namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\customer;
use App\Models\order;
use App\Models\shop;
use App\Models\storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    function profile()
    {
        $data = ['LoggedInfo' => admin::where('id', '=', session('LoggedAdmin'))->first()];
        return view('admin.profile', $data);
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
    function deleteShop($id)
    {
        DB::beginTransaction();
        try {
            storage::where('shopId', $id)->delete();
            order::where('shopId', $id)->delete();
            shop::where('id', $id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withSuccess("Алдаа гарлаа." . $th);
        }
        return redirect()->back()->withSuccess("Амжилттай устгалаа.");
    }
    function deleteCustomer($id)
    {
        DB::beginTransaction();
        try {
            order::where('customerId', $id)->delete();
            customer::where('customerId', $id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withSuccess("Алдаа гарлаа." . $th);
        }
        return redirect()->back()->withSuccess("Амжилттай устгалаа.");
    }
}