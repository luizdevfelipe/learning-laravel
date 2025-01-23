@props(['label', 'amount', 'color'])

@php
    $colorClasses = [
            'green' => ['bg' => 'bg-green-100', 'text' => 'text-green-500'],
            'red' => ['bg' => 'bg-red-100', 'text' => 'text-red-500'],
            'blue' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-500'],
            'yellow' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-500'],
        ]
@endphp

<div {{ $attributes->class(['bg-white' => false, 'flex items-center p-4 shadow rounded'])->merge(['title' => 'Default Title']) }}>
    <div class="p-2 {{ $colorClasses[$color]['bg'] }} rounded-full">
        <span class="fas fa-dollar-sign {{ $colorClasses[$color]['text'] }}">$</span>
    </div>
    <span class="ml-2 text-xl font-bold text-gray-900">{{ $label }}: ${{ number_format($amount, 2, ',', '.') }}</span>
</div>