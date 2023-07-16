<x-app-layout>
    <x-alert :message="session('message')" />
    <div id="modal" style="display: none;">
        <x-modal>
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Delete Selected') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Are you sure you want to delete the selected resources?') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button onclick="toggleModal(false)">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3">
                        {{ __('Delete') }}
                    </x-danger-button>
                </div>
            </div>
        </x-modal>
    </div>
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
                <div class="flex gap-3">
                    <form action="{{ route('posts.edit', ['post' => $post->postId]) }}" method="GET">
                        @csrf
                        <x-secondary-button type="submit">
                            {{ __('Edit') }}
                        </x-secondary-button>
                    </form>
                    <x-secondary-button type="button" class="text-red-600" onclick="toggleModal(true)">
                        {{ __('Delete') }}
                    </x-secondary-button>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
