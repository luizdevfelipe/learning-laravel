@props(['label' => 'Default Label', 'amount'])

<div class="flex items-center bg-white p-4 shadow rounded" {{ $attributes }}>
    <i class="fas fa-dollar-sign text-green-500"></i>
    <span class="ml-2 text-xl font-bold text-gray-900">{{ $label }}: ${{ number_format($amount, 2, ',', '.') }}</span>
</div>