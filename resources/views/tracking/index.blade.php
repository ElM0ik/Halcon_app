@extends('layouts.guest')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-center mb-6 text-gray-800 dark:text-white">Track Your Order</h1>

        <form action="{{ route('tracking.search') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="invoice_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Invoice Number
                </label>
                <input
                    type="text"
                    id="invoice_number"
                    name="invoice_number"
                    value="{{ old('invoice_number') }}"
                    required
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    placeholder="Enter your invoice number"
                >
                @error('invoice_number')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="customer_code" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Customer Code
                </label>
                <input
                    type="text"
                    id="customer_code"
                    name="customer_code"
                    value="{{ old('customer_code') }}"
                    required
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    placeholder="Enter your customer code"
                >
                @error('customer_code')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                Track Order
            </button>
        </form>
    </div>
</div>
@endsection