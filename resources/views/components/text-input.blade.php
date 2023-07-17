@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'px-3 border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm bg-white' .
        ($disabled ? ' border-white shadow-none' : ''),
]) !!}>
