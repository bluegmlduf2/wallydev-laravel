<x-app-layout>
    <div class="flex flex-col">
        <x-slot name="header">
            <h1 class="font-bold text-4xl mt-2 mb-4 md:my-7">
                {{ $post->title }}
            </h1>
        </x-slot>
        <div id="viewer">
            @php
                echo $post->content;
            @endphp
        </div>
        <div class="flex justify-between items-center mt-5 mb-3 text-gray-500 border-t-2 border-t-gray-300 p-3">
            <div>
                <span>{{ \Carbon\Carbon::parse($post->createdDate)->toFormattedDateString() }}</span>
                <span class="pl-3">Views {{ $post->postViewCount }}</span>
            </div>
            @if (Gate::allows('is-admin'))
                <form action="{{ route('post.edit', ['post' => $post->postId]) }}" method="GET">
                    @csrf
                    <x-secondary-button type="submit">
                        {{ __('Edit') }}
                    </x-secondary-button>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
