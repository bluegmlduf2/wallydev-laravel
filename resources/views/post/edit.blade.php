<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl mt-2 mb-4 md:my-7">
            {{ __('Write') }}
        </h2>
    </x-slot>

    <div class="mb-4">
        <x-text-input id="title" type="text" class="mt-1 block w-full" value="{{ $post->title ?? '' }}"
            spellcheck="false" />
    </div>

    <div id="editor" spellcheck="false">
        @php
            echo $post->content ?? '';
        @endphp
    </div>

    <div class="flex justify-between mt-3">
        <x-secondary-button onclick="location.href = '{{ URL::previous() ?? route('home') }}'">
            {{ __('Cancel') }}
        </x-secondary-button>
        <x-primary-button>
            {{ __('Confirm') }}
        </x-primary-button>
    </div>
</x-app-layout>
