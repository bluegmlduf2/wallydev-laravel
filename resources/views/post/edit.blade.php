<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl mt-2 mb-4 md:my-7">
            {{ __('Write') }}
        </h2>
    </x-slot>
    <form id="createPostForm" method="POST" onsubmit="event.preventDefault();">
        @csrf
        @if ($post->postId ?? null)
            {{-- <input type="hidden" name="_method" value="PATCH"/> --}}
            @method('PATCH')
        @endif
        <div class="mb-4">
            <div class="flex justify-between">
                <x-text-input id="title" name="title" type="text" class="mr-2 w-full" :value="old('title', $post->title ?? '')"
                    spellcheck="false" />
                <select name="category" id="category"
                    class="border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm">
                    <option value="life">Life</option>
                    <option value="javascript">Javascript</option>
                    <option value="vuejs">VueJs</option>
                    <option value="php">PHP</option>
                    <option value="others">Others</option>
                </select>
            </div>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        {{-- 작성한 게시글 --}}
        <div id="editor" spellcheck="false">
            {{-- xss 방지하지 않은 내용 그대로 출력 --}}
            {!! old('content', $post->content ?? '') !!}
        </div>
        {{-- 작성한 게시글 전송용 --}}
        <input type="hidden" name="content" id="content">

        <div class="flex justify-between mt-3">
            <x-secondary-button onclick="location.href = '{{ URL::previous() ?? route('home') }}'">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-primary-button onclick="createOrUpdatePost('{{ $post->postId ?? null }}')">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        function createOrUpdatePost(postId) {
            const createPostForm = document.getElementById('createPostForm');
            document.getElementById('content').value = window.editor.getHTML();

            createPostForm.action = postId ? "{{ route('posts.update', $post->postId ?? '') }}" :
                "{{ route('posts.store') }}";

            createPostForm.submit();
        }
    </script>
</x-app-layout>
