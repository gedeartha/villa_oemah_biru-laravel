@props(['active'])

@php
$classes = $active ?? false ? 'block py-2 space-y-2' : 'hidden py-2 space-y-2';
@endphp

<ul {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</ul>
