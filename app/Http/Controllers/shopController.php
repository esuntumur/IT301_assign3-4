<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\shop;
use App\Models\content;
use App\Models\storage;

class shopController extends Controller
{

    //
    function dashboardShop()
    {
        $data = ['LoggedInfo' => shop::where('id', '=', session('LoggedShop'))->first()];
        return view('shop.dashboard', $data);
    }
    //
    function searchForm(Request $request)
    {
        return view('shop.searchForm');
    }
    function searchContent(Request $request)
    {
        $data = ['LoggedInfo' => content::where('name', 'LIKE', '%' . $request->search . '%')
            ->orwhere('type', 'LIKE', '%' . $request->search . '%')
            ->orwhere('author', 'LIKE', '%' . $request->search . '%')
            ->orwhere('producer', 'LIKE', '%' . $request->search . '%')
            ->get()];
        // return count($data['LoggedInfo']) == 0;
        if (count($data['LoggedInfo']) == 0) // $data['LoggedInfo'] = [datasd ds af]
        {
            $data['fail'] = "Таны хайсан контент олдсонгүй. Шинээр нэмнэ үү.";
            // return $data;
            return view('shop.searchForm', $data);
        } else if (count($data['LoggedInfo']) > 0) {
            return view('shop.searchForm', $data);
        }
    }
    //
    function myContent()
    {
        return view('shop.myContent');
    }
    function addContent($id)
    {
        $content = [
            'content' => content::where('id', '=', $id)->first(),
            'shopId' => content::where('id', '=', Session()->get('LoggedShop'))->first()
        ];
        return view('shop.addContent', $content);
    }
    public function doAddContent(Request $request)
    {
        $storage = new storage;
        $storage->contentId = $request->contentId;
        $storage->quantity = $request->quantity;
        $storage->price = $request->price;
        $storage->shopId = $request->shopId;
        $storage->rentQuantity = $request->rentQuantity;
        $storage->save();

        return redirect()->back()->withSuccess('Таны оруулсан контент амжилттай нэмэгдлээ');
    }
    public function createContent()
    {
        return view('shop.createContent');
    }
    public function doCreateContent(Request $request)
    {
        $content = new content;
        $content->name = $request->name;
        $content->author = $request->author;
        $content->producer = $request->producer;
        $content->type = $request->type;
        $content->duration = $request->duration;
        $content->save();

        return redirect()->back()->withSuccess('Таны оруулсан контент амжилттай нэмэгдлээ');
    }
}