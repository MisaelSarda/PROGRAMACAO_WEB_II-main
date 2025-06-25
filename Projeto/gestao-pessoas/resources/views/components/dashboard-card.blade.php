@props(['label', 'valor', 'cor' => 'blue']) {{-- cor: blue|green|purple --}}
@php
    $cores = [
        'blue'   => 'text-blue-600',
        'green'  => 'text-green-600',
        'purple' => 'text-purple-600',
    ];
@endphp
<div class="bg-white p-6 rounded shadow">
    <h3 class="text-lg font-semibold">{{ $label }}</h3>
    <p class="text-3xl font-bold {{ $cores[$cor] ?? 'text-blue-600' }} mt-2">
        {{ $valor }}
    </p>
</div>
