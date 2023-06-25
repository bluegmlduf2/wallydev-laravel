<x-app-layout>
    <div class="flex flex-col">
        <x-slot name="header">
            <h1 class="font-bold text-3xl mt-2 mb-4 md:my-7">
                {{ $post->title }}
            </h1>
        </x-slot>
        <div id="viewer">
            @php
                echo $post->content;
            @endphp
        </div>
    </div>
</x-app-layout>
