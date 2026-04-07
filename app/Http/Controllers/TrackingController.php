<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // <- esta línea faltaba

class TrackingController extends Controller
{
    public function index() {
        return view('tracking.index');
    }

    public function search(Request $request) {
        $request->validate([
            'invoice_number' => 'required|string',
            'customer_code'  => 'required|string',
        ]);

        $order = Order::active()
            ->where('invoice_number', $request->invoice_number)
            ->where('customer_code', $request->customer_code)
            ->with('evidences')
            ->first();

        return view('tracking.result', compact('order'));
    }
}