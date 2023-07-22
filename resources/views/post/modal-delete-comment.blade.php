<div id="modal-delete-comment" style="display: none;">
    <x-modal>
        <form id="delete-comment-form" method="POST" class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Delete Selected') }}
            </h2>

            <p class="mt-3 text-sm text-gray-600">
                {{ __('Are you sure you want to delete this :resource?', ['resource' => __('validation.attributes.comment')]) }}
            </p>

            <p class="mt-3">
                <x-text-input class="w-full" type="password" name="password-delete" :value="old('password-delete')"
                    placeholder="{{ __('Please enter a :resource of at least :length characters', ['resource' => __('Password'), 'length' => '4']) }}"
                    autocomplete="off" autofocus />
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button onclick="clickDeleteCommentModal(false)">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <div>
                    @csrf
                    @method('delete')
                    <x-danger-button class="ml-3" onclick="deleteComment()" type="button">
                        {{ __('Delete') }}
                    </x-danger-button>
                </div>
            </div>
        </form>
    </x-modal>
</div>
<script>
    let commentId;

    function clickDeleteCommentModal(isOpen, commentId = '') {
        this.commentId = commentId;
        const modal = document.getElementById('modal-delete-comment');
        modal.style.display = isOpen ? "block" : "none";
    }

    function deleteComment() {
        const form = document.getElementById('delete-comment-form');
        form.action = `/posts/{{ $post->postId }}/${this.commentId}`;
        form.submit();
    }
</script>
