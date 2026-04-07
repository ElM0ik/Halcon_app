<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Order Tracking</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Basic Tailwind-like styles for simplicity */
            body { font-family: 'Instrument Sans', sans-serif; background-color: #f9fafb; color: #111827; }
            .container { max-width: 1200px; margin: 0 auto; padding: 0 1rem; }
            .bg-white { background-color: white; }
            .rounded-lg { border-radius: 0.5rem; }
            .shadow-md { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
            .p-6 { padding: 1.5rem; }
            .text-center { text-align: center; }
            .text-2xl { font-size: 1.5rem; }
            .font-bold { font-weight: bold; }
            .mb-6 { margin-bottom: 1.5rem; }
            .space-y-4 > * + * { margin-top: 1rem; }
            .block { display: block; }
            .text-sm { font-size: 0.875rem; }
            .font-medium { font-weight: 500; }
            .mb-1 { margin-bottom: 0.25rem; }
            .w-full { width: 100%; }
            .px-3 { padding-left: 0.75rem; padding-right: 0.75rem; }
            .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
            .border { border-width: 1px; }
            .border-gray-300 { border-color: #d1d5db; }
            .rounded-md { border-radius: 0.375rem; }
            .focus\:outline-none:focus { outline: none; }
            .focus\:ring-2:focus { box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5); }
            .mt-1 { margin-top: 0.25rem; }
            .text-red-600 { color: #dc2626; }
            .bg-blue-600 { background-color: #2563eb; }
            .hover\:bg-blue-700:hover { background-color: #1d4ed8; }
            .text-white { color: white; }
            .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
            .px-4 { padding-left: 1rem; padding-right: 1rem; }
            .transition { transition-property: all; }
            .duration-200 { transition-duration: 200ms; }
            .focus\:ring-offset-2:focus { box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5), 0 0 0 2px rgba(59, 130, 246, 0); }
            .mx-auto { margin-left: auto; margin-right: auto; }
            .max-w-md { max-width: 28rem; }
            .text-gray-800 { color: #1f2937; }
            .text-gray-700 { color: #374151; }
        </style>
    @endif
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-4xl">
        @yield('content')
    </div>
</body>
</html>