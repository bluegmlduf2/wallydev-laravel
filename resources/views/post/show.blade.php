<x-app-layout>
    <x-alert :message="session('message')" />
    @include('components.modal-post')
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
        <div class="mb-3">
            <div>
                <x-input-label for="comment" class="font-semibold text-xl my-3" :value="__('validation.attributes.comment')" />
            </div>
            <form class="flex space-x-2" action="{{ route('comments.store', ['post' => $post->postId]) }}"
                method="post">
                @csrf
                <div class="flex flex-col space-y-2 w-3/12">
                    <x-text-input id="name" type="text" name="name" :value="old('name')"
                        placeholder="{{ __('Name') }}" autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <x-text-input id="password" type="password" name="password" :value="old('password')"
                        placeholder="{{ __('Password') }}" autofocus />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="flex flex-col w-7/12 md:w-full">
                    <x-text-area-input id="comment" :name="'comment'" :value="old('comment')" spellcheck="false"
                        :placeholder="__('Please Input :resource', [
                            'resource' => __('validation.attributes.comment'),
                        ])" />
                    <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                </div>
                <div class="flex w-2/12 md:w-1/12">
                    <x-primary-button class="w-full justify-center">
                        {{ __('Confirm') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class="mt-6 mb-4 space-y-2">
            <div class="flex space-x-4">
                <x-input-label for="comment" class="font-semibold text-lg truncate my-3 w-3/12 md:w-1/12"
                    :value="'사용자명1111'" />
                <x-text-input id="name" class="w-9/12 md:w-11/12" type="text" name="name"
                    :value="'테스트내용입니다11111111111'" />
            </div>
            <div class="flex space-x-4">
                <x-input-label for="comment" class="font-semibold text-lg truncate my-3 w-3/12 md:w-1/12"
                    :value="'사용자명22'" />
                <x-text-input id="name" class="w-9/12 md:w-11/12" :disabled="true" name="name"
                    :value="'테스트내용입니다22'" />
            </div>
        </div>
    </div>
</x-app-layout>
