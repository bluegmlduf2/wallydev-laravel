<div id="modal-delete-post" style="display: none;">
    <x-modal>
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Delete Selected') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Are you sure you want to delete this :resource?', ['resource' => __('validation.attributes.post')]) }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button onclick="clickDeletePostModal(false)">
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
<script>
    function clickDeletePostModal(isOpen) {
        const modal = document.getElementById('modal-delete-post');
        modal.style.display = isOpen ? "block" : "none";
    }
</script>
