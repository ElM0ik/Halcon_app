@extends('layouts.app')
@section('title', 'Editar Orden')

@section('content')
<div class="card" style="max-width:700px">
    <div class="flex" style="margin-bottom:1rem">
        <a href="{{ route('orders.show', $order) }}" class="btn btn-gray btn-sm">← Volver</a>
        <h1 style="margin:0">Editar: {{ $order->invoice_number }}</h1>
    </div>

    <form method="POST" action="{{ route('orders.update', $order) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem">
            <div class="form-group">
                <label>Número de Factura</label>
                <input type="text" value="{{ $order->invoice_number }}" disabled style="background:#f9fafb;color:#6b7280">
            </div>
            <div class="form-group">
                <label>Código de Cliente</label>
                <input type="text" value="{{ $order->customer_code }}" disabled style="background:#f9fafb;color:#6b7280">
            </div>
        </div>

        <div class="form-group">
            <label for="customer_name">Nombre del Cliente *</label>
            <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" required>
        </div>

        <div class="form-group">
            <label for="delivery_address">Dirección de Entrega</label>
            <textarea id="delivery_address" name="delivery_address">{{ old('delivery_address', $order->delivery_address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="additional_notes">Notas Adicionales</label>
            <textarea id="additional_notes" name="additional_notes">{{ old('additional_notes', $order->additional_notes) }}</textarea>
        </div>

        <div class="form-group">
            <label for="current_status">Cambiar Status</label>
            <select id="current_status" name="current_status" required>
                @foreach(['Ordered','In Process','In Route','Delivered'] as $status)
                    <option value="{{ $status }}" {{ $order->current_status === $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <div id="photo-section" style="display:none; background:#f0fdf4; border:1px solid #bbf7d0; border-radius:6px; padding:1rem; margin-bottom:1rem">
            <label for="evidence_photo">📷 Foto de Evidencia</label>
            <p style="font-size:0.8rem; color:#6b7280; margin-bottom:0.5rem">
                Sube una foto como evidencia del status seleccionado.
            </p>
            <input type="file" id="evidence_photo" name="evidence_photo" accept="image/*" capture="environment" style="margin-bottom:0">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

<script>
    const statusSelect = document.getElementById('current_status');
    const photoSection = document.getElementById('photo-section');

    function togglePhoto() {
        const needsPhoto = ['In Route', 'Delivered'].includes(statusSelect.value);
        photoSection.style.display = needsPhoto ? 'block' : 'none';
    }

    statusSelect.addEventListener('change', togglePhoto);
    togglePhoto(); // run on load
</script>
@endsection
