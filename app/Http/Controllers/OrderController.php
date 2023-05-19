<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Requests\StatusListRequest;

class OrderController extends Controller
{
    public function getStatus($id)
    {
        $order = Order::find($id);
        $statuses = Status::all();
        // dd($order, $statuses);
        return view('bootstrap_views.orders.edit_order_status', compact('order', 'statuses'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status_id = $request->statusEdit;

        $order->save();
        return redirect()->route('received.orders')->with('success', 'The Order Status is Sucessfully updated!');
    }
}
