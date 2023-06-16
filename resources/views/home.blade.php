@php
    for ($i = 1; $i <= 5; $i++) {
        $post = [
            'title' => "게시물 제목 Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, dicta consequuntur! Non eos atque ipsam fugiat ab esse provident temporibus asperiores optio quaerat quibusdam laudantium tempora, vitae vero alias at!{$i}",
            'content' => "게시물 내용 Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, dicta consequuntur! Non eos atque ipsam fugiat ab esse provident temporibus asperiores optio quaerat quibusdam laudantium tempora, vitae vero alias at!{$i}",
            'time' => $i,
            'titleImage' => 'https://picsum.photos/300',
        ];
    
        $posts[] = $post;
    }
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl mt-2 mb-4 md:my-7">
            Latest Posts
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        @foreach ($posts as $post)
            <x-card :post="$post" />
        @endforeach
    </div>
</x-app-layout>
