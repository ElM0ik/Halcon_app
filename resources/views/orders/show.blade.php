@extends('layouts.app')
@section('title', 'Ver Orden')

@section('content')
<div class="card">
    <div class="flex" style="justify-content:space-between; margin-bottom:1.25rem">
        <div class="flex">
            <a href="{{ route('orders.index') }}" class="btn btn-gray btn-sm">← Volver</a>
            <h1 style="margin:0">Orden: {{ $order->invoice_number }}</h1>
        </div>
        <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary btn-sm">Editar</a>
    </div>

    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1.5rem">
        <div>
            <p style="color:#6b7280;font-size:0.8rem">Cliente</p>
            <p style="font-weight:600">{{ $order->customer_name }}</p>
        </div>
        <div>
            <p style="color:#6b7280;font-size:0.8rem">Código de Cliente</p>
            <p style="font-weight:600">{{ $order->customer_code }}</p>
        </div>
        <div>
            <p style="color:#6b7280;font-size:0.8rem">Status</p>
            @php $badges = ['Ordered'=>'badge-ordered','In Process'=>'badge-process','In Route'=>'badge-route','Delivered'=>'badge-delivered']; @endphp
            <span class="badge {{ $badges[$order->current_status] ?? '' }}">{{ $order->current_status }}</span>
        </div>
        <div>
            <p style="color:#6b7280;font-size:0.8rem">Creado por</p>
            <p style="font-weight:600">{{ $order->employee?->full_name ?? '—' }}</p>
        </div>
        <div>
            <p style="color:#6b7280;font-size:0.8rem">Fecha de Creación</p>
            <p>{{ $order->created_at->format('d/m/Y H:i') }}</p>
        </div>
        <div>
            <p style="color:#6b7280;font-size:0.8rem">Última Actualización</p>
            <p>{{ $order->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    @if($order->delivery_address)
    <div style="margin-bottom:1rem">
        <p style="color:#6b7280;font-size:0.8rem">Dirección de Entrega</p>
        <p>{{ $order->delivery_address }}</p>
    </div>
    @endif

    @if($order->tax_information)
    <div style="margin-bottom:1rem">
        <p style="color:#6b7280;font-size:0.8rem">Información Fiscal</p>
        <p>{{ $order->tax_information }}</p>
    </div>
    @endif

    @if($order->additional_notes)
    <div style="margin-bottom:1rem">
        <p style="color:#6b7280;font-size:0.8rem">Notas Adicionales</p>
        <p>{{ $order->additional_notes }}</p>
    </div>
    @endif

    @if($order->evidences->count())
    <hr style="margin:1.5rem 0; border-color:#e5e7eb">
    <h2>Evidencias Fotográficas</h2>
    <div style="display:flex; gap:1rem; flex-wrap:wrap; margin-top:0.75rem">
        @foreach($order->evidences as $ev)
        <div style="text-align:center">
            <span class="badge {{ $ev->category === 'delivered' ? 'badge-delivered' : 'badge-route' }}" style="margin-bottom:0.5rem;display:block">
                {{ $ev->category === 'delivered' ? 'Entregado' : 'En Ruta' }}
            </span>
            <img src="{{ route('evidence.show', basename($ev->image_url)) }}"
                 alt="Evidencia" style="width:200px; height:150px; object-fit:cover; border-radius:6px; border:1px solid #e5e7eb">
            <p style="font-size:0.75rem;color:#9ca3af;margin-top:0.25rem">{{ $ev->uploaded_at }}</p>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
