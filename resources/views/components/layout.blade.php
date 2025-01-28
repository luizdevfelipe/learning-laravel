<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    
    <x-navigation.nav/>

    @isset($header)
        @if ($extendHeader ?? false)
            <x-header>{{ $headerTitle ?? 'Default Title' }}</x-header>
        @endif
        {{ $header }}
    @else
        <x-header>{{ $headerTitle ?? 'Default Title' }}</x-header>
    @endisset

    <main class="container mx-auto py-6 px-4">
        <section class="bg-white p-4 rounded shadow-lg">
            {{ $slot }}
        </section>
    </main>
</body>
</html>
