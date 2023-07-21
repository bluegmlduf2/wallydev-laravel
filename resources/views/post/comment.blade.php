<div class="mb-3">
    <div class="flex items-center">
        <x-input-label class="font-semibold text-xl my-3" :value="__('validation.attributes.comment') . __('CreateNew')" />
        <svg class="w-10 h-6 cursor-pointer" viewBox="0 0 24 24" fill="none" id="open-comment-wrapper"
            onclick="toggleComment(true)" style="display: block">
            <path
                d="M17.9188 8.17969H11.6888H6.07877C5.11877 8.17969 4.63877 9.33969 5.31877 10.0197L10.4988 15.1997C11.3288 16.0297 12.6788 16.0297 13.5088 15.1997L15.4788 13.2297L18.6888 10.0197C19.3588 9.33969 18.8788 8.17969 17.9188 8.17969Z"
                fill="#292D32" />
        </svg>
        <svg class="w-10 h-6 cursor-pointer" viewBox="0 0 24 24" fill="none" id="close-comment-wrapper"
            onclick="toggleComment(false)" style="display: none">
            <path
                d="M18.6806 13.9783L15.4706 10.7683L13.5106 8.79828C12.6806 7.96828 11.3306 7.96828 10.5006 8.79828L5.32056 13.9783C4.64056 14.6583 5.13056 15.8183 6.08056 15.8183H11.6906H17.9206C18.8806 15.8183 19.3606 14.6583 18.6806 13.9783Z"
                fill="#292D32" />
        </svg>
    </div>
    <form id="comment-wrapper" class="flex space-x-2" action="{{ route('comments.store', ['post' => $post->postId]) }}"
        style="{{ $errors->any() ? 'display: flex' : 'display: none' }}" method="post">
        @csrf
        <div class="flex flex-col space-y-2 w-3/12">
            <x-text-input id="name" type="text" name="name" :value="old('name')"
                placeholder="{{ __('Name') }}" autocomplete="username" autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <x-text-input id="password" type="password" name="password" :value="old('password')"
                placeholder="{{ __('Password') }}" autocomplete="current-password" autofocus />
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
<div class="mt-5 mb-4 space-y-2">
    <div class="grid grid-cols-12 md:grid-cols-12 gap-4 comment-wrapper">
        <x-input-label class="font-semibold text-lg truncate my-3 col-span-3 md:col-span-1" :value="'사용자명1111'" />
        <x-text-input class="col-span-7 md:col-span-10" disabled type="text" name="comment-update" spellcheck="false"
            :placeholder="__('Please Input :resource', [
                'resource' => __('validation.attributes.comment'),
            ])" :value="old('comment-update')" />
        <x-input-error :messages="$errors->get('comment-update')" class="mt-2" />
        <x-text-input class="col-span-5 md:col-span-2 col-start-4 hidden" type="password" name="password-update"
            :value="old('password-update')" placeholder="{{ __('Password') }}" autocomplete="current-password" autofocus />
        <x-input-error :messages="$errors->get('current-password')" class="mt-2" />
        <div class="flex justify-end items-center col-span-2 md:col-span-1 comment-button-wrapper">
            <svg fill="#58D68D" class="w-7 h-7 cursor-pointer save-comment-button hidden" viewBox="0 -8 72 72"
                onclick="toggleEditComment(this)">
                <path
                    d="M61.07,12.9,57,8.84a2.93,2.93,0,0,0-4.21,0L28.91,32.73,19.2,23A3,3,0,0,0,15,23l-4.06,4.07a2.93,2.93,0,0,0,0,4.21L26.81,47.16a2.84,2.84,0,0,0,2.1.89A2.87,2.87,0,0,0,31,47.16l30.05-30a2.93,2.93,0,0,0,0-4.21Z" />
            </svg>
            <svg class="w-6 h-6 cursor-pointer delete-comment-button hidden" viewBox="-3 0 32 32" fill="none"
                onclick="toggleEditComment(this)">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                    sketch:type="MSPage">
                    <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-259.000000, -203.000000)"
                        fill="#E74C3C">
                        <path
                            d="M282,211 L262,211 C261.448,211 261,210.553 261,210 C261,209.448 261.448,209 262,209 L282,209 C282.552,209 283,209.448 283,210 C283,210.553 282.552,211 282,211 L282,211 Z M281,231 C281,232.104 280.104,233 279,233 L265,233 C263.896,233 263,232.104 263,231 L263,213 L281,213 L281,231 L281,231 Z M269,206 C269,205.447 269.448,205 270,205 L274,205 C274.552,205 275,205.447 275,206 L275,207 L269,207 L269,206 L269,206 Z M283,207 L277,207 L277,205 C277,203.896 276.104,203 275,203 L269,203 C267.896,203 267,203.896 267,205 L267,207 L261,207 C259.896,207 259,207.896 259,209 L259,211 C259,212.104 259.896,213 261,213 L261,231 C261,233.209 262.791,235 265,235 L279,235 C281.209,235 283,233.209 283,231 L283,213 C284.104,213 285,212.104 285,211 L285,209 C285,207.896 284.104,207 283,207 L283,207 Z M272,231 C272.552,231 273,230.553 273,230 L273,218 C273,217.448 272.552,217 272,217 C271.448,217 271,217.448 271,218 L271,230 C271,230.553 271.448,231 272,231 L272,231 Z M267,231 C267.552,231 268,230.553 268,230 L268,218 C268,217.448 267.552,217 267,217 C266.448,217 266,217.448 266,218 L266,230 C266,230.553 266.448,231 267,231 L267,231 Z M277,231 C277.552,231 278,230.553 278,230 L278,218 C278,217.448 277.552,217 277,217 C276.448,217 276,217.448 276,218 L276,230 C276,230.553 276.448,231 277,231 L277,231 Z"
                            id="trash" sketch:type="MSShapeGroup">

                        </path>
                    </g>
                </g>
            </svg>
            <svg class="w-6 h-6 cursor-pointer edit-comment-button" viewBox="0 0 24 24" fill="none"
                onclick="toggleEditComment(this)">
                <path id="vector"
                    d="M18.4101 3.6512L20.5315 5.77252C21.4101 6.6512 21.4101 8.07582 20.5315 8.9545L9.54019 19.9458C9.17774 20.3082 8.70239 20.536 8.19281 20.5915L4.57509 20.9856C3.78097 21.072 3.11061 20.4017 3.1971 19.6076L3.59111 15.9898C3.64661 15.4803 3.87444 15.0049 4.23689 14.6425L3.70656 14.1121L4.23689 14.6425L15.2282 3.6512C16.1068 2.77252 17.5315 2.77252 18.4101 3.6512Z"
                    stroke="#979A9A" stroke-width="1.5" />
                <path id="vector_2"
                    d="M15.2282 3.6512C16.1068 2.77252 17.5315 2.77252 18.4101 3.6512L20.5315 5.77252C21.4101 6.6512 21.4101 8.07582 20.5315 8.9545L18.7283 10.7576L13.425 5.45432L15.2282 3.6512Z"
                    stroke="#979A9A" stroke-width="1.5" />
            </svg>
            <svg class="w-6 h-6 cursor-pointer cancel-comment-button hidden" fill="#979A9A" viewBox="0 0 32 32"
                onclick="toggleEditComment(this)">
                <path
                    d="M19.587 16.001l6.096 6.096c0.396 0.396 0.396 1.039 0 1.435l-2.151 2.151c-0.396 0.396-1.038 0.396-1.435 0l-6.097-6.096-6.097 6.096c-0.396 0.396-1.038 0.396-1.434 0l-2.152-2.151c-0.396-0.396-0.396-1.038 0-1.435l6.097-6.096-6.097-6.097c-0.396-0.396-0.396-1.039 0-1.435l2.153-2.151c0.396-0.396 1.038-0.396 1.434 0l6.096 6.097 6.097-6.097c0.396-0.396 1.038-0.396 1.435 0l2.151 2.152c0.396 0.396 0.396 1.038 0 1.435l-6.096 6.096z">
                </path>
            </svg>
        </div>
    </div>
</div>
<script>
    function toggleComment(isOpen) {
        const comment = document.getElementById('comment-wrapper');
        const closeComment = document.getElementById('close-comment-wrapper');
        const openComment = document.getElementById('open-comment-wrapper');

        comment.style.display = isOpen ? 'flex' : 'none';
        closeComment.style.display = isOpen ? 'block' : 'none';
        openComment.style.display = isOpen ? 'none' : 'block';
    }

    function toggleEditComment(e) {
        const commentWrapper = e.closest('.comment-wrapper');
        const commentWrapperObject = {
            'commentUpdate': commentWrapper.querySelector('[name="comment-update"]'),
            'passwordUpdate': commentWrapper.querySelector('[name="password-update"]'),
            'saveCommentButton': commentWrapper.querySelector('.save-comment-button'),
            'deleteCommentButton': commentWrapper.querySelector('.delete-comment-button'),
            'editCommentButton': commentWrapper.querySelector('.edit-comment-button'),
            'cancelCommentButton': commentWrapper.querySelector('.cancel-comment-button'),
            'commentButtonWrapper': commentWrapper.querySelector('.comment-button-wrapper'),
        };

        switch (true) {
            case e.classList.contains('save-comment-button'):
                break;
            case e.classList.contains('edit-comment-button'):
                clickEditComment(commentWrapperObject);
                break;
            case e.classList.contains('delete-comment-button'):
                break;
            case e.classList.contains('cancel-comment-button'):
                clickCancelComment(commentWrapperObject);
                break;
        }
    }

    function clickEditComment(commentWrapperObject) {
        // 수정모드
        commentWrapperObject.commentUpdate.disabled = false;
        commentWrapperObject.commentUpdate.classList.add('md:col-span-8');
        commentWrapperObject.commentUpdate.classList.remove('md:col-span-10');
        commentWrapperObject.commentUpdate.classList.add('col-span-9');
        commentWrapperObject.commentUpdate.classList.remove('col-span-7');
        commentWrapperObject.commentUpdate.classList.remove('border-white', '!shadow-none');
        commentWrapperObject.commentButtonWrapper.classList.add('col-span-4');
        commentWrapperObject.commentButtonWrapper.classList.remove('col-span-2');
        commentWrapperObject.commentButtonWrapper.classList.add('justify-between');
        commentWrapperObject.commentButtonWrapper.classList.remove('justify-end');
        commentWrapperObject.passwordUpdate.style.display = 'block';
        commentWrapperObject.saveCommentButton.style.display = 'block';
        commentWrapperObject.deleteCommentButton.style.display = 'block';
        commentWrapperObject.editCommentButton.style.display = 'none';
        commentWrapperObject.cancelCommentButton.style.display = 'block';
    }

    function clickCancelComment(commentWrapperObject) {
        // 표시모드
        commentWrapperObject.commentUpdate.disabled = true;
        commentWrapperObject.commentUpdate.classList.add('md:col-span-10');
        commentWrapperObject.commentUpdate.classList.remove('md:col-span-8');
        commentWrapperObject.commentUpdate.classList.add('col-span-7');
        commentWrapperObject.commentUpdate.classList.remove('col-span-9');
        commentWrapperObject.commentUpdate.classList.add('border-white', '!shadow-none');
        commentWrapperObject.commentButtonWrapper.classList.remove('col-span-4');
        commentWrapperObject.commentButtonWrapper.classList.add('col-span-2');
        commentWrapperObject.commentButtonWrapper.classList.remove('justify-between');
        commentWrapperObject.commentButtonWrapper.classList.add('justify-end');
        commentWrapperObject.passwordUpdate.style.display = 'none';
        commentWrapperObject.saveCommentButton.style.display = 'none';
        commentWrapperObject.deleteCommentButton.style.display = 'none';
        commentWrapperObject.editCommentButton.style.display = 'block';
        commentWrapperObject.cancelCommentButton.style.display = 'none';
    }
</script>
