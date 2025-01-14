<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto">
            @php
                $active = 'font-bold border-b-2 border-white';

                $dashboard = request()->routeIs('dashboard') ? $active : null;
                $transactions = request()->routeIs('transactions') ? $active : null;
                $categories = request()->routeIs('categories') ? $active : null;                
            @endphp

            <a href="{{ route('dashboard', absolute:false) }}" class="text-white hover:bg-blue-700 p-2 rounded {{ $dashboard }}">Dashboard</a>
            <a href="{{ route('transactions', absolute:false) }}" class="text-white ml-4 hover:bg-blue-700 p-2 rounded {{ $transactions }}">Transactions</a>
            <a href="{{ route('categories', absolute:false) }}" class="text-white ml-4 hover:bg-blue-700 p-2 rounded {{ $categories }}">Categories</a>
        </div>
    </nav>
    @section('header')
        <header class="bg-white shadow">
            <div class="container mx-auto py-6 px-4">
                <h1 class="text-3xl font-bold text-gray-900">@yield('header-title')</h1>
            </div>
        </header>
    @show
    <main class="container mx-auto py-6 px-4">
        <section class="bg-white p-4 rounded shadow-lg">
            @yield('content')
        </section>
    </main>
</body>
</html>
