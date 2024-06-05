<?php

namespace App\Http\Controllers;

use App\DataTables\OrderDataTable;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('admin.orders.order');
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
    }

    public function show($id)
    {
        $order_statuses = OrderStatus::all();
        $order = Order::with('OrderProducts.product', 'discount', 'orderStatus')->findOrFail($id);
        return view('admin.orders.order_details', compact('order', 'order_statuses'));
    }

    public function change_status(Request $request)
    {

        $validatedData = $request->validate([
            'order_id' => 'required',
            'order_status_id' => 'required',
        ]);

        $order = Order::findOrFail($validatedData['order_id']);

        $order->order_status_id = $validatedData['order_status_id'];
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
    }
}
