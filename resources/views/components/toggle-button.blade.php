@props(['active'])

<label class="relative inline-flex items-center mr-5 cursor-pointer">
    <input type="checkbox" class="sr-only peer" name="toggle-active" @disabled($active)
        @checked($active)>
    <div
        class="w-11 h-6 bg-gray-200 rounded-full peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
    </div>
    <span class="ml-3 text-sm font-medium text-gray-400">{{ $slot }}</span>
</label>
