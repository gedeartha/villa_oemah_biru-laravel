@props(['active'])

@php
$classes = $active ?? false ? 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 bg-tertiary font-semibold group cursor' : 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-tertiary hover:font-semibold group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
