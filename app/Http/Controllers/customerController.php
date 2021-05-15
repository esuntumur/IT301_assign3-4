<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\content;
use App\Models\customer;
use App\Models\shop;
use App\Models\storage;
use App\Models\order;
use Illuminate\Http\Request;
use DateTime;

class customerController extends Controller
{
    function dashboardHome()
    {
        $data = ['LoggedInfo' => admin::where('id', '=', session('LoggedCustomer'))->first()];
        return view('customer.home', $data);
    }
    function dateSchedule()
    {
        return now()->toArray();
        // todo
        $orders = order::where("renting", 0)->get();
        foreach ($orders as $order) {
            $datetime1 = new DateTime($order['created_at']);
            $datetime2 = new \DateTime('NOW');

            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a'); //now do whatever you like with $days
            if ($days >= 1) {
                order::where("id", $order['id'])->delete();
            }
        }
    }
    function myOrder()
    {
        // todo) => захиалгын хүсэлт хийснээс хойш 1 хоногт --> хэрэглэгч контентоо дэлгүүрээс авах || устгах
        // return $this->dateSchedule();
        $customerID = session('LoggedCustomer');
        $myOrder = order::where('customerId', '=', $customerID)->get();

        // todo 1 honogoos hetersen bol ustgah

        // ($myOrder[$i]['givedDate']-$myOrder[$i]['created_at'] < 1day)
        //   $myOrder[$i]['renting']=0; $myOrder=delete;
        //     $myOrder[$i]['fine']=
        $myContents = [];
        $shops = [];
        for ($i = 0; $i < count($myOrder); $i++) {
            $content = content::where('id', '=', $myOrder[$i]['contentId'])->get()->toArray();
            array_push($myContents, $content);
        }
        for ($i = 0; $i < count($myOrder); $i++) {
            $shop = shop::where('id', '=', $myOrder[$i]['shopId'])->get()->toArray();
            array_push($shops, $shop);
        }
        $data = [
            'myOrder' => $myOrder,
            'myContents' => $myContents,
            'shops' => $shops
        ];
        return view('customer.myOrder', $data);
    }

    function getContent($id)
    {
        $data = ['ContentData' => content::where('id', '=', $id)->first()];
        return view('customer.getContent', $data);
    }

    function orderContent($id)
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
    function extendRequest($orderId)
    {
        $order = order::where('id', $orderId)->first();
        if ($order->extend == null) {
            $order->extend = 0;
            $order->save();
            return redirect()->back()->withSuccess("Амжилттай хүсэлт илгээлээ.");
        } else if ($order->extend == 1)
            return redirect()->back()->withSuccess("Өмнө хүсэлт илгээсэн байна.");
    }
}
