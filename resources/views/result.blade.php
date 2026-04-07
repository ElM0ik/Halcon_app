@extends('layouts.guest')
@section('content')
@if($order)
    <p>Status: <strong>{{ $order->current_status }}</strong></p>
    @if($order->current_status === 'Delivered')
        @foreach($order->evidences->where('category','delivered') as $ev)
            <img src="{{ Storage::url($ev->image_url) }}" alt="Delivery proof">
        @endforeach
    @else
        <p>Your order is currently: {{ $order->current_status }}</p>
        <p>Last updated: {{ $order->updated_at->format('Y-m-d H:i') }}</p>
    @endif
@else
    <p>No order found with that invoice number and customer code.</p>
@endif
@endsection