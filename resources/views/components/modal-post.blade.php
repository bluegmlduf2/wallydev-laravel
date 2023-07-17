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

                <form action="{{ route('posts.destroy', ['post' => $post->postId]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <x-danger-button class="ml-3" type="submit">
                        {{ __('Delete') }}
                    </x-danger-button>
                </form>
            </div>
        </div>
    </x-modal>
</div>
