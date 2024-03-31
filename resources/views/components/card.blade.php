<a href="/posts/{{ $post->postId }}">
    <div class="rounded-lg overflow-hidden shadow-lg hover:grow hover:shadow-lg h-full">
        <div class="w-full h-64">
            <img class="w-full h-full object-cover bg-gray-200"
                @if ($post['imageUrl']) src="{{ $post['imageUrl'] }}" alt="postimage" @endif>
        </div>
        <div class="p-4 bg-white flex flex-col">
            <h4 class="text-xl font-bold truncate">{{ $post['title'] }}</h4>
            <p class="text-sm my-3 line-clamp-3">{{ $post['contentShort'] }}</p>
            <div>
                <small class="text-gray-600">{{ date_format($post['createdDate'],"Y-m-d H:i") }}</small>
            </div>
        </div>
    </div>
</a>
