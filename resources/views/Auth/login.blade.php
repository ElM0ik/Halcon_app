<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Halcon</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: sans-serif; background: #f3f4f6; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .card { background: white; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); padding: 2rem; width: 100%; max-width: 400px; }
        h1 { text-align: center; font-size: 1.5rem; margin-bottom: 0.25rem; color: #1e3a5f; }
        .subtitle { text-align: center; font-size: 0.875rem; color: #6b7280; margin-bottom: 1.5rem; }
        label { display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.3rem; color: #374151; }
        input { width: 100%; padding: 0.6rem 0.75rem; border: 1px solid #d1d5db; border-radius: 5px; font-size: 0.9rem; margin-bottom: 1rem; }
        input:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 2px rgba(37,99,235,0.2); }
        .btn { width: 100%; background: #2563eb; color: white; border: none; padding: 0.65rem; border-radius: 5px; font-size: 1rem; cursor: pointer; font-weight: 500; }
        .btn:hover { background: #1d4ed8; }
        .error { background: #fee2e2; border: 1px solid #fca5a5; color: #991b1b; padding: 0.65rem 1rem; border-radius: 5px; margin-bottom: 1rem; font-size: 0.875rem; }
        .track-link { display: block; text-align: center; margin-top: 1rem; font-size: 0.875rem; color: #2563eb; text-decoration: none; }
        .track-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="card">
    <h1>🦅 Halcon</h1>
    <p class="subtitle">Sistema de Gestión de Pedidos</p>

    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="ejemplo@halcon.com">

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required placeholder="••••••••">

        <button type="submit" class="btn">Iniciar sesión</button>
    </form>

    <a href="{{ route('tracking.index') }}" class="track-link">← Rastrear un pedido sin cuenta</a>
</div>
</body>
</html>
