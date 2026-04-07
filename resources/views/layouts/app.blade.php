<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halcon - @yield('title', 'Panel')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f3f4f6; color: #111827; }
        nav { background: #1e3a5f; color: white; padding: 0.75rem 1.5rem; display: flex; align-items: center; justify-content: space-between; }
        nav a { color: #93c5fd; text-decoration: none; margin-right: 1rem; }
        nav a:hover { color: white; }
        nav .user-info { font-size: 0.875rem; color: #cbd5e1; }
        nav form { display: inline; }
        nav button { background: #dc2626; color: white; border: none; padding: 0.4rem 0.8rem; border-radius: 4px; cursor: pointer; font-size: 0.875rem; }
        nav button:hover { background: #b91c1c; }
        .container { max-width: 1100px; margin: 2rem auto; padding: 0 1rem; }
        .card { background: white; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.1); padding: 1.5rem; margin-bottom: 1.5rem; }
        h1 { font-size: 1.5rem; margin-bottom: 1rem; }
        h2 { font-size: 1.2rem; margin-bottom: 0.75rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 0.6rem 0.75rem; border-bottom: 1px solid #e5e7eb; font-size: 0.9rem; }
        th { background: #f9fafb; font-weight: 600; }
        tr:hover td { background: #f0f9ff; }
        .btn { display: inline-block; padding: 0.4rem 0.85rem; border-radius: 5px; font-size: 0.875rem; cursor: pointer; text-decoration: none; border: none; }
        .btn-primary { background: #2563eb; color: white; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-danger { background: #dc2626; color: white; }
        .btn-danger:hover { background: #b91c1c; }
        .btn-success { background: #16a34a; color: white; }
        .btn-success:hover { background: #15803d; }
        .btn-gray { background: #6b7280; color: white; }
        .btn-gray:hover { background: #4b5563; }
        .btn-sm { padding: 0.25rem 0.6rem; font-size: 0.8rem; }
        label { display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.3rem; color: #374151; }
        input[type=text], input[type=email], input[type=password], input[type=file], select, textarea {
            width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #d1d5db;
            border-radius: 5px; font-size: 0.9rem; margin-bottom: 1rem; background: white;
        }
        input:focus, select:focus, textarea:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 2px rgba(59,130,246,0.2); }
        textarea { min-height: 80px; resize: vertical; }
        .alert-success { background: #dcfce7; border: 1px solid #86efac; color: #166534; padding: 0.75rem 1rem; border-radius: 5px; margin-bottom: 1rem; }
        .alert-error { background: #fee2e2; border: 1px solid #fca5a5; color: #991b1b; padding: 0.75rem 1rem; border-radius: 5px; margin-bottom: 1rem; }
        .badge { display: inline-block; padding: 0.2rem 0.6rem; border-radius: 999px; font-size: 0.75rem; font-weight: 600; }
        .badge-ordered { background: #dbeafe; color: #1d4ed8; }
        .badge-process { background: #fef9c3; color: #854d0e; }
        .badge-route { background: #fed7aa; color: #9a3412; }
        .badge-delivered { background: #dcfce7; color: #166534; }
        .flex { display: flex; gap: 0.5rem; align-items: center; }
        .mb-1 { margin-bottom: 0.5rem; }
        .mt-1 { margin-top: 0.5rem; }
        .form-group { margin-bottom: 1rem; }
    </style>
</head>
<body>
<nav>
    <div>
        <strong>🦅 Halcon</strong>
        <a href="{{ route('dashboard') }}" style="margin-left:1.5rem">Dashboard</a>
        <a href="{{ route('orders.index') }}">Órdenes</a>
        <a href="{{ route('orders.archived') }}">Archivadas</a>
        @if(Auth::user()->department === 'Admin')
            <a href="{{ route('employees.index') }}">Usuarios</a>
        @endif
    </div>
    <div class="flex">
        <span class="user-info">{{ Auth::user()->full_name }} &bull; {{ Auth::user()->department }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Salir</button>
        </form>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert-error">
            <ul style="list-style:none">
                @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>
</body>
</html>
