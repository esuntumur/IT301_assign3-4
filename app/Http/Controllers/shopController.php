<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\shop;
use App\Http\Controllers\MainController;
use App\Models\content;

class shopController extends Controller
{
    public function doAddContent(Request $request)
    {
        $user = DB::table('shop')->where('email', $request->email)
            ->where('token', $request->token);
        if ($user) {
            DB::table('content')->insert([
                'contentId' => $request->contentId
            ]);
            return redirect()->back()->withSuccess('Таны оруулсан контент амжилттай нэмэгдлээ');
        }
    }
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
        //$data = content::where('name','LIKE','%'.$request->search.'%')->get();
        return view('shop.searchForm', $data);
    }
    //
    function myContent()
    {
        return view('shop.myContent');
    }
}
