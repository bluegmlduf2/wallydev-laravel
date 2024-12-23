@props([
    'disabled' => false,
    'type' => 'text', // 기본 type은 'text'
])

<input 
    type="{{ $type }}" {{-- type 속성을 동적으로 설정 --}}
    {{ $disabled ? 'disabled' : '' }} 
    {!! $attributes->merge([
        'class' =>
            'px-3 border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm bg-white' .
            ($disabled ? ' border-white !shadow-none' : ''),
    ]) !!}
>