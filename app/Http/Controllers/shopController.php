<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\shop;
use App\Models\content;
use App\Models\order;
use App\Models\storage;
use DateInterval;
use DateTime;

class shopController extends Controller
{
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
            $data['fail'] = "Таны хайсан контент олдсонгүй. Шинэ контент үүсгэх.";
            // return $data;
            return view('shop.searchForm', $data);
        } else if (count($data['LoggedInfo']) > 0) {
            return view('shop.searchForm', $data);
        }
    }
    //
    function myStorage()
    {
        $myStorage = storage::join('contents', 'contents.id', '=', 'storages.contentId')
            ->select('contents.name', 'contents.author', 'storages.contentId', 'storages.quantity', 'storages.price', 'storages.rentQuantity', 'storages.type')
            ->where('shopId', Session()->get('LoggedShop'))
            ->get();
        return view('shop.myStorage', compact('myStorage'));
    }
    function storeContent($id)
    {
        $content = [
            'content' => content::where('id', '=', $id)->first(),
            'shopId' => content::where('id', '=', Session()->get('LoggedShop'))->first()
        ];
        return view('shop.storeContent', $content);
    }
    public function doStoreContent(Request $request)
    {
        $storage = new storage;
        $storage->contentId = $request->contentId;
        $storage->quantity = $request->quantity;
        $storage->price = $request->price;
        $storage->shopId = $request->shopId;
        $storage->rentQuantity = 0;
        $storage->type = $request->type;
        $storage->save();

        return redirect()->back()->withSuccess('Та энэхүү шинэ контентыг агуулахдаа амжилттай хадгаллаа.');
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
    // give content
    function giveContent()
    {
        return view('shop.giveContent');
    }
    function doGiveContent(Request $request)
    {
        $order = order::where("id", $request->orderId)->get()->first();
        if ($order)
            if ($order['renting'] == 1)
                return redirect()->back()->withSuccess("Захиалгын контент аль хэдийн хэрэглэгчид өгөгдсөн байна.");
        $update = order::where("id", $request->orderId)->update(["renting" => 1, "givedDate" => now()]);
        if ($update)
            return redirect()->back()->withSuccess("Захиалгын контентыг амжилттай хэрэглэгчид амжилттай өглөө.");
        else
            return redirect()->back()->withSuccess("Захиалгын дугаар буруу байна.");
    }
    // recieve content
    function recieveContent()
    {
        return view('shop.recieveContent');
    }
    function doRecieveContent(Request $request)
    {
        $order = order::where("id", $request->orderId)->get()->first();
        if ($order) {
            if ($order['renting'] == 1) {
                $givedDate = new DateTime($order['givedDate']);
                $now = new \DateTime('NOW');
                $day = $now->diff($givedDate)->format('%a');
                if ($day < 7 || $order->extend == 1 && $day < 9) {
                    DB::beginTransaction();
                    try {
                        $storage = storage::where('shopId', $order->shopId)->where('contentId', $order->contentId)->first();
                        $quantityDiff = $storage['quantity'] + $order->quantity;
                        storage::where('shopId', $order->shopId)->where('contentId', $order->contentId)->update(['quantity' => $quantityDiff]);
                        order::where("id", $request->orderId)->update(["renting" => 0, "fine" => 0, 'returnedDate' => now() . ""]);
                        DB::commit();
                        return redirect()->back()->withSuccess("Захиалгын контентыг амжилттай хүлээн авлаа." . $day . " хоног түрээсэлсэн байна.");
                    } catch (\Exception $e) {
                        DB::rollback();
                        return "Захиалгыг хүлээн авах үед алдаа гарав: " . $e;
                    }
                } else {
                    DB::beginTransaction();
                    try {
                        $storage = storage::where('shopId', $order->shopId)->where('contentId', $order->contentId)->first();
                        $quantityDiff = $storage['quantity'] + $order->quantity;
                        storage::where('shopId', $order->shopId)->where('contentId', $order->contentId)->update(['quantity' => $quantityDiff]);
                        $recievedDate = new DateTime($order['givedDate']);
                        if ($order->extend == 1) {
                            $days = $now->diff($recievedDate)->format('%a') - 9;
                        } else {
                            $days = $now->diff($recievedDate)->format('%a') - 7;
                        }
                        order::where("id", $request->orderId)->update(["renting" => 0, "fine" => $days * $order['orderPrice'] / 10, 'returnedDate' => now() . ""]);
                        DB::commit();
                        return redirect()->back()->withSuccess("Захиалгын контентыг амжилттай хүлээн авлаа. Захиалгын контент буцаалт $days хоногоор хоцорсон байна. Торгуул: " . ($days * $order['orderPrice'] / 10) . "₮");
                    } catch (\Exception $e) {
                        DB::rollback();
                        return "Торгууль бодох үед алдаа гарав: " . $e;
                    }
                }
            } else
                return redirect()->back()->withSuccess("Захиалгын контентыг өмнө нь хүлээн авсан байна");
        } else
            return redirect()->back()->withSuccess("Захиалга олдсонгүй");
    }
    function myOrder()
    {
        $ContentNames = [];
        $orders = order::where('shopId', session()->get('LoggedShop'))->get();

        // return $data['orders'];
        foreach ($orders as $order) {
            $contentName = content::where('id', $order->contentId)->first();
            array_push($ContentNames, $contentName);
        }
        $data = [
            'orders' => $orders,
            'content' => $ContentNames
        ];
        return view("shop.myOrder", $data);
    }
    protected $fillable = ['extend'];
    function extendOrder($orderId)
    {

        $order = order::where('id', $orderId)->first();

        $order->extend = 1;
        $order->save();
        return  redirect()->back()->withSuccess("Амжилттай сунгалаа");
    }
}
