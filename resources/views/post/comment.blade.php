<div class="mb-3">
    <div class="flex items-center">
        <x-input-label for="comment" class="font-semibold text-xl my-3" :value="__('validation.attributes.comment') . __('CreateNew')" />
        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
            <path
                d="M17.9188 8.17969H11.6888H6.07877C5.11877 8.17969 4.63877 9.33969 5.31877 10.0197L10.4988 15.1997C11.3288 16.0297 12.6788 16.0297 13.5088 15.1997L15.4788 13.2297L18.6888 10.0197C19.3588 9.33969 18.8788 8.17969 17.9188 8.17969Z"
                fill="#292D32" />
        </svg>
        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
            <path
                d="M18.6806 13.9783L15.4706 10.7683L13.5106 8.79828C12.6806 7.96828 11.3306 7.96828 10.5006 8.79828L5.32056 13.9783C4.64056 14.6583 5.13056 15.8183 6.08056 15.8183H11.6906H17.9206C18.8806 15.8183 19.3606 14.6583 18.6806 13.9783Z"
                fill="#292D32" />
        </svg>
    </div>
    <form class="flex space-x-2" action="{{ route('comments.store', ['post' => $post->postId]) }}" method="post">
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
        <x-input-label for="comment" class="font-semibold text-lg truncate my-3 w-3/12 md:w-1/12" :value="'사용자명1111'" />
        <x-text-input id="name" class="w-9/12 md:w-11/12" type="text" name="name" :value="'테스트내용입니다11111111111'" />
    </div>
    <div class="flex space-x-4">
        <x-input-label for="comment" class="font-semibold text-lg truncate my-3 w-3/12 md:w-1/12" :value="'사용자명22'" />
        <x-text-input id="name" class="w-9/12 md:w-11/12" :disabled="true" name="name" :value="'테스트내용입니다22'" />
    </div>
</div>
