<x-dropdown align="top" width="30">
    <x-slot name="trigger">
        <button
            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
            <div>
                <x-country-icon :country="session('locale')" />
            </div>
        </button>
    </x-slot>
    <x-slot name="content">
        <x-dropdown-link class="px-1 py-1" :href="route('locale', 'ko')">
            <x-country-icon country="ko" />
        </x-dropdown-link>
        <x-dropdown-link class="px-1 py-1" :href="route('locale', 'ja')">
            <x-country-icon country="ja" />
        </x-dropdown-link>
        <x-dropdown-link class="px-1 py-1" :href="route('locale', 'en')">
            <x-country-icon country="en" />
        </x-dropdown-link>
    </x-slot>
</x-dropdown>