@extends('layouts.app')
@section('title', 'Crear Usuario')

@section('content')
<div class="card" style="max-width:600px">
    <div class="flex" style="margin-bottom:1rem">
        <a href="{{ route('employees.index') }}" class="btn btn-gray btn-sm">← Volver</a>
        <h1 style="margin:0">Crear Usuario</h1>
    </div>

    <form method="POST" action="{{ route('employees.store') }}">
        @csrf

        <div class="form-group">
            <label for="full_name">Nombre completo</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required placeholder="Ej. Juan Pérez">
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="juan@halcon.com">
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required placeholder="Mínimo 8 caracteres">
        </div>

        <div class="form-group">
            <label for="department">Departamento / Rol</label>
            <select id="department" name="department" required>
                <option value="">-- Seleccionar --</option>
                @foreach(['Admin','Sales','Purchasing','Warehouse','Route'] as $dept)
                    <option value="{{ $dept }}" {{ old('department') === $dept ? 'selected' : '' }}>{{ $dept }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
</div>
@endsection
