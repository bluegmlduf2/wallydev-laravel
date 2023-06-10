@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-green-500 text-base font-extrabold leading-5 focus:outline-none focus:border-green-800 transition duration-150 ease-in-out cursor-pointer'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-base font-extrabold leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out cursor-pointer';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
