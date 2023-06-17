{{-- <a href="{{ route('posts.show', ['post' => 1]) }}"> --}}
<a href="#">
    <div class="rounded-lg overflow-hidden shadow-lg hover:grow hover:shadow-lg">
        <div class="w-full h-64">
            <img class="w-full h-full bg-center" src={{ $post['imageUrl'] }} alt="postimage">
        </div>
        <div class="p-4 bg-white flex flex-col min-h-275">
            <h4 class="text-xl font-bold truncate">{{ $post['title'] }}</h4>
            <p class="text-sm my-3 line-clamp-3">{{ $post['content'] }}</p>
            <div>
                <small class="text-gray-600">{{ $post['createdDate'] }}</small>
            </div>
        </div>
    </div>
</a>
