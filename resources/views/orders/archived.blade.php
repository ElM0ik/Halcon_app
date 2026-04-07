@extends('layouts.app')
@section('title', 'Órdenes Archivadas')

@section('content')
<div class="card">
    <div class="flex" style="justify-content:space-between; margin-bottom:1rem">
        <h1 style="margin:0">🗄️ Órdenes Archivadas</h1>
        <a href="{{ route('orders.index') }}" class="btn btn-gray btn-sm">← Volver a Órdenes</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Factura</th>
                <th>Cliente</th>
                <th>Código</th>
                <th>Último Status</th>
                <th>Fecha Creación</th>
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
                    @php $badges = ['Ordered'=>'badge-ordered','In Process'=>'badge-process','In Route'=>'badge-route','Delivered'=>'badge-delivered']; @endphp
                    <span class="badge {{ $badges[$order->current_status] ?? '' }}">{{ $order->current_status }}</span>
                </td>
                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                <td>
                    <form method="POST" action="{{ route('orders.restore', $order) }}" onsubmit="return confirm('¿Restaurar esta orden?')">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success btn-sm">↩ Restaurar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;color:#9ca3af">No hay órdenes archivadas.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
