<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function update(Request $request, $order)
{
 
    $validatedData = $request->validate([
        'update_payment' => 'required|in:pending,completed', 
    ]);


    $order = Order::findOrFail($order);

  
    $order->payment_status = $validatedData['update_payment'];
    $order->save();


    return redirect()->route('admin.orders.index')->with('success', 'Order payment status updated successfully');
}

    public function delete($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('admin.orders.index')->with('error', 'Order not found');
        }

        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully');
    }
}
