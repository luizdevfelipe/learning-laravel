<nav class="bg-blue-500 p-4">
    <div class="container mx-auto flex items-center">
        <img class="h-8 mr-4" src="{{ Vite::asset('resources/images/logo.png') }}" alt="Logo">
        @php
        $active = 'font-bold border-b-2 border-white';

        $dashboard = request()->routeIs('dashboard') ? $active : null;
        $transactions = request()->routeIs('transactions.index') ? $active : null;
        $categories = request()->routeIs('categories') ? $active : null;
        @endphp

        <a href="{{ route('dashboard', absolute:false) }}" class="text-white hover:bg-blue-700 p-2 rounded {{ $dashboard }}">Dashboard</a>
        <a href="{{ route('transactions.index', absolute:false) }}" class="text-white ml-4 hover:bg-blue-700 p-2 rounded {{ $transactions }}">Transactions</a>
        <a href="{{ route('categories', absolute:false) }}" class="text-white ml-4 hover:bg-blue-700 p-2 rounded {{ $categories }}">Categories</a>
    </div>
</nav>