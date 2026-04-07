@extends('layouts.guest')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-center mb-6 text-gray-800 dark:text-white">Order Tracking Result</h1>

        @if($order)
            <div class="space-y-4">
                <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-md">
                    <p class="text-lg font-semibold text-gray-800 dark:text-white">
                        Status: <span class="text-blue-600 dark:text-blue-400">{{ $order->current_status }}</span>
                    </p>
                </div>

                @if($order->current_status === 'Delivered')
                    <div class="space-y-2">
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Delivery Proof:</h2>
                        @foreach($order->evidences->where('category','delivered') as $ev)
                            <img src="{{ Storage::url($ev->image_url) }}" alt="Delivery proof" class="w-full rounded-md shadow-sm">
                        @endforeach
                    </div>
                @else
                    <div class="p-4 bg-yellow-50 dark:bg-yellow-900 rounded-md">
                        <p class="text-gray-800 dark:text-gray-200">
                            Your order is currently: <strong>{{ $order->current_status }}</strong>
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            Last updated: {{ $order->updated_at->format('Y-m-d H:i') }}
                        </p>
                    </div>
                @endif

                <div class="text-center">
                    <a href="{{ route('tracking.index') }}" class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                        Track Another Order
                    </a>
                </div>
            </div>
        @else
            <div class="text-center space-y-4">
                <div class="p-4 bg-red-50 dark:bg-red-900 rounded-md">
                    <p class="text-red-800 dark:text-red-200 font-medium">
                        No order found with that invoice number and customer code.
                    </p>
                </div>

                <a href="{{ route('tracking.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                    Try Again
                </a>
            </div>
        @endif
    </div>
</div>
@endsection