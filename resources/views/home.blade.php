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
    <div class="flex justify-center pt-5">
        {{ $posts->links() }}
    </div>
</x-app-layout>
