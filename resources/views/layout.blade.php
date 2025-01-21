<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    
    <x-navigation.nav/>

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
