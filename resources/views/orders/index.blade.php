@extends('layouts.app')
@section('title', 'Órdenes')

@section('content')
<div class="card">
    <div class="flex" style="justify-content:space-between; margin-bottom:1rem">
        <h1 style="margin:0">Órdenes</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">+ Nueva Orden</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Factura</th>
                <th>Cliente</th>
                <th>Código</th>
                <th>Status</th>
                <th>Fecha</th>
                <th>Creado por</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td><strong>{{ $order->invoice_number }}</strong></td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->customer_code }}</td>
                <td>
                    @php
                        $badges = ['Ordered'=>'badge-ordered','In Process'=>'badge-process','In Route'=>'badge-route','Delivered'=>'badge-delivered'];
                    @endphp
                    <span class="badge {{ $badges[$order->current_status] ?? '' }}">{{ $order->current_status }}</span>
                </td>
                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                <td>{{ $order->employee?->full_name ?? '—' }}</td>
                <td>
                    <div class="flex">
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-gray btn-sm">Ver</a>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form method="POST" action="{{ route('orders.destroy', $order) }}" onsubmit="return confirm('¿Archivar esta orden?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Archivar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;color:#9ca3af">No hay órdenes activas.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
