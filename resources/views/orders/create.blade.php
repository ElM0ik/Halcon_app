@extends('layouts.app')
@section('title', 'Nueva Orden')

@section('content')
<div class="card" style="max-width:700px">
    <div class="flex" style="margin-bottom:1rem">
        <a href="{{ route('orders.index') }}" class="btn btn-gray btn-sm">← Volver</a>
        <h1 style="margin:0">Nueva Orden</h1>
    </div>

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <div class="form-group">
            <label for="invoice_number">Número de Factura *</label>
            <input type="text" id="invoice_number" name="invoice_number" value="{{ old('invoice_number') }}" required placeholder="Ej. INV-0001">
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem">
            <div class="form-group">
                <label for="customer_name">Nombre del Cliente *</label>
                <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
            </div>
            <div class="form-group">
                <label for="customer_code">Código del Cliente *</label>
                <input type="text" id="customer_code" name="customer_code" value="{{ old('customer_code') }}" required placeholder="Ej. CLI-001">
            </div>
        </div>

        <div class="form-group">
            <label for="tax_information">Información Fiscal</label>
            <textarea id="tax_information" name="tax_information">{{ old('tax_information') }}</textarea>
        </div>

        <div class="form-group">
            <label for="delivery_address">Dirección de Entrega</label>
            <textarea id="delivery_address" name="delivery_address">{{ old('delivery_address') }}</textarea>
        </div>

        <div class="form-group">
            <label for="additional_notes">Notas Adicionales</label>
            <textarea id="additional_notes" name="additional_notes">{{ old('additional_notes') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crear Orden</button>
    </form>
</div>
@endsection
