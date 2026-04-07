<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Evidence;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::active()->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function create() {
        return view('orders.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'invoice_number'   => 'required|unique:orders',
            'customer_name'    => 'required',
            'customer_code'    => 'required',
            'delivery_address' => 'nullable',
            'additional_notes' => 'nullable',
            'tax_information'  => 'nullable',
        ]);
        $data['created_by'] = Auth::id(); // <- cambiar auth()->id() por Auth::id()
        Order::create($data);
        return redirect()->route('orders.index')->with('success', 'Order created.');
    }

    public function show(Order $order) {
        $order->load('evidences', 'employee');
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order) {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order) {
        $data = $request->validate([
            'customer_name'    => 'required',
            'delivery_address' => 'nullable',
            'additional_notes' => 'nullable',
            'current_status'   => 'required|in:Ordered,In Process,In Route,Delivered',
        ]);
        $order->update($data);

        if (in_array($data['current_status'], ['In Route', 'Delivered']) && $request->hasFile('evidence_photo')) {
            $path = $request->file('evidence_photo')->store('evidences', 'private');
            Evidence::create([
                'order_id'  => $order->id,
                'category'  => $data['current_status'] === 'In Route' ? 'in_route' : 'delivered',
                'image_url' => $path,
            ]);
        }

        return redirect()->route('orders.show', $order)->with('success', 'Order updated.');
    }

    public function destroy(Order $order) {
        $order->update(['is_archived' => true]);
        return redirect()->route('orders.index')->with('success', 'Order archived.');
    }

    public function archived() {
        $orders = Order::archived()->latest()->get();
        return view('orders.archived', compact('orders'));
    }

    public function restore(Order $order) {
        $order->update(['is_archived' => false]);
        return redirect()->route('orders.archived')->with('success', 'Order restored.');
    }
}