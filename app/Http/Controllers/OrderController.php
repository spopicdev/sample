<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::with(['product'])->get(), 200);
    }


    public function store(OrderRequest $request)
    {
        dd($request->all());

        $order = Order::create([
            'email' => $request->email,
            'shipping_address_1' => $request->shipping_address_1,
            'shipping_address_2' => $request->shipping_address_2,
            'shipping_address_3' => $request->shipping_address_3,
            'city' => $request->city,
            'country_code' => $request->country_code,
            'zip_postal_code' => $request->zip_postal_code
        ]);

        return response()->json([
            'status' => (bool)$order,
            'data' => $order,
            'message' => $order ? 'Order Created!' : 'Error Creating Order'
        ]);
    }

    public function show(Order $order)
    {
        return response()->json($order, 200);
    }

    public function update(Request $request, Order $order)
    {
        $status = $order->update(
            $request->only(['quantity'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Order Updated!' : 'Error Updating Order'
        ]);
    }

    public function destroy(Order $order)
    {
        $status = $order->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Order Deleted!' : 'Error Deleting Order'
        ]);
    }
}
