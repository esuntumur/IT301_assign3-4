<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\content;
use App\Models\customer;
use App\Models\shop;
use App\Models\storage;
use Illuminate\Http\Request;

class customerController extends Controller
{
    function dashboardHome()
    {
        $data = ['LoggedInfo' => admin::where('id', '=', session('LoggedCustomer'))->first()];
        return view('customer.home', $data);
    }

    function myOrder()
    {
        $data = ['LoggedInfo' => admin::where('id', '=', session('LoggedCustomer'))->first()];
        return view('customer.myOrder', $data);
    }

    public function getContent($id)
    {
        $data = ['ContentData' => content::where('id', '=', $id)->first()];
        return view('customer.getContent', $data);
    }

    public function orderContent($id)
    {
        $storage = storage::where('contentId', '=', $id)->get()->toArray(); // Storages by selected content
        $shops = [];
        for ($i = 0; $i < count($storage); $i++) {
            $shop = shop::where('id', '=', $storage[$i]['shopId'])->get()->toArray();
            array_push($shops, $shop);
        }
        $data = [
            'ContentData' => content::where('id', '=', $id)->first(),
            'storage' => $storage,
            'shops' => $shops,
        ];
        return view('customer.orderContent', $data);
    }

    function dashboardCustomer()
    {
        $data = ['LoggedInfo' => customer::where('id', '=', session('LoggedCustomer'))->first()];
        return view('customer.dashboard', $data);
    }

    function searchContent(Request $request)
    {
        $data = ['LoggedInfo' => content::where('name', 'LIKE', '%' . $request->search . '%')
            ->orwhere('type', 'LIKE', '%' . $request->search . '%')
            ->orwhere('author', 'LIKE', '%' . $request->search . '%')
            ->orwhere('producer', 'LIKE', '%' . $request->search . '%')
            ->get()];
        //$data = content::where('name','LIKE','%'.$request->search.'%')->get();
        return view('customer.search', $data);
    }
}
