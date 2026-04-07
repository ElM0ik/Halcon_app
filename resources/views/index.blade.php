@extends('layouts.guest')
@section('content')
<h1>Track Your Order</h1>
<form method="POST" action="{{ route('tracking.search') }}">
    @csrf
    <input type="text" name="invoice_number" placeholder="Invoice Number" required>
    <input type="text" name="customer_code" placeholder="Customer Code" required>
    <button type="submit">Search</button>
</form>
@endsection