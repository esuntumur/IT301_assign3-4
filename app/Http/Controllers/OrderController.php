<?php
// * B170910031 Есөнтөмөр
namespace App\Http\Controllers;

use App\Models\order;
use App\Models\storage;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $quantity = storage::where('shopId', $request->shopId)->where('contentId', $request->contentId)->first();
        if ($quantity['quantity'] > $request->quantity) {
            $quantityDiff = $quantity['quantity'] - $request->quantity;
            storage::where('shopId', $request->shopId)->where('contentId', $request->contentId)->update(['quantity' => $quantityDiff]);
        } else return redirect()->back()->withSuccess('Захиалах боломжит тоо: ' . $quantity['quantity']);
        $rowPrice = storage::where("contentId", $request->contentId)->first();
        $order = new order();
        $order->customerId = $request->customerId;
        $order->shopId = $request->shopId;
        $order->contentId = $request->contentId;
        $order->quantity = $request->quantity;
        $order->orderPrice = $order->quantity * $rowPrice->price;
        $order->renting = 0;
        $order->save();
        return redirect()->back()->withSuccess('Таны захиалга амжилттай нэмэгдлээ');
        // return $request->quantity;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}