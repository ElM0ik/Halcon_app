@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="card">
    <h1>Bienvenido, {{ Auth::user()->full_name }}</h1>
    <p style="color:#6b7280; margin-bottom:1.5rem">Departamento: <strong>{{ Auth::user()->department }}</strong></p>

    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap:1rem">

        <a href="{{ route('orders.index') }}" style="text-decoration:none">
            <div style="background:#eff6ff; border:1px solid #bfdbfe; border-radius:8px; padding:1.25rem; text-align:center">
                <div style="font-size:2rem">📦</div>
                <div style="font-weight:600; color:#1d4ed8; margin-top:0.5rem">Órdenes</div>
                <div style="font-size:0.8rem; color:#6b7280">Ver y gestionar pedidos</div>
            </div>
        </a>

        <a href="{{ route('orders.archived') }}" style="text-decoration:none">
            <div style="background:#f9fafb; border:1px solid #e5e7eb; border-radius:8px; padding:1.25rem; text-align:center">
                <div style="font-size:2rem">🗄️</div>
                <div style="font-weight:600; color:#374151; margin-top:0.5rem">Archivadas</div>
                <div style="font-size:0.8rem; color:#6b7280">Pedidos archivados</div>
            </div>
        </a>

        @if(Auth::user()->department === 'Admin')
        <a href="{{ route('employees.index') }}" style="text-decoration:none">
            <div style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:8px; padding:1.25rem; text-align:center">
                <div style="font-size:2rem">👥</div>
                <div style="font-weight:600; color:#15803d; margin-top:0.5rem">Usuarios</div>
                <div style="font-size:0.8rem; color:#6b7280">Gestión de empleados</div>
            </div>
        </a>
        @endif

        <a href="{{ route('tracking.index') }}" style="text-decoration:none">
            <div style="background:#fefce8; border:1px solid #fde68a; border-radius:8px; padding:1.25rem; text-align:center">
                <div style="font-size:2rem">🔍</div>
                <div style="font-weight:600; color:#92400e; margin-top:0.5rem">Portal Público</div>
                <div style="font-size:0.8rem; color:#6b7280">Rastreo de pedidos</div>
            </div>
        </a>

    </div>
</div>
@endsection
