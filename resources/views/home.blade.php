<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl mt-2 mb-3">
            Latest Posts
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <x-card/>
        <x-card/>
        <x-card/>
        <x-card/>
        <x-card/>
    </div>
</x-app-layout>
