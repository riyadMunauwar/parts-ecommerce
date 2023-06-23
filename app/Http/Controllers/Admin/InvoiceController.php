<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class InvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $orderId = $request->orderId;

        if(!$orderId) return abort(403);

        $order = Order::with('orderItems.product', 'address', 'user')->find($orderId);

        return view('invoices.html-invoice', compact('order'));
    }


}
