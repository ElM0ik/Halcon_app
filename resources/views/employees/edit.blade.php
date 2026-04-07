@extends('layouts.app')
@section('title', 'Editar Usuario')

@section('content')
<div class="card" style="max-width:600px">
    <div class="flex" style="margin-bottom:1rem">
        <a href="{{ route('employees.index') }}" class="btn btn-gray btn-sm">← Volver</a>
        <h1 style="margin:0">Editar Usuario</h1>
    </div>

    <form method="POST" action="{{ route('employees.update', $employee) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="full_name">Nombre completo</label>
            <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $employee->full_name) }}" required>
        </div>

        <div class="form-group">
            <label>Correo electrónico</label>
            <input type="text" value="{{ $employee->email }}" disabled style="background:#f9fafb;color:#6b7280">
            <small style="color:#9ca3af">El correo no se puede cambiar.</small>
        </div>

        <div class="form-group">
            <label for="department">Departamento / Rol</label>
            <select id="department" name="department" required>
                @foreach(['Admin','Sales','Purchasing','Warehouse','Route'] as $dept)
                    <option value="{{ $dept }}" {{ $employee->department === $dept ? 'selected' : '' }}>{{ $dept }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="is_active">Estado</label>
            <select id="is_active" name="is_active">
                <option value="1" {{ $employee->is_active ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ !$employee->is_active ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
