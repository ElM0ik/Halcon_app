@extends('layouts.app')
@section('title', 'Usuarios')

@section('content')
<div class="card">
    <div class="flex" style="justify-content:space-between; margin-bottom:1rem">
        <h1 style="margin:0">Usuarios</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Nuevo Usuario</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Departamento</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->full_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->department }}</td>
                <td>
                    @if($employee->is_active)
                        <span class="badge badge-delivered">Activo</span>
                    @else
                        <span class="badge" style="background:#fee2e2;color:#991b1b">Inactivo</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary btn-sm">Editar</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;color:#9ca3af">No hay usuarios registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
