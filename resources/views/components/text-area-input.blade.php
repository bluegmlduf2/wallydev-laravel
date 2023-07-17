@props(['disabled' => false, 'placeholder' => $placeholder, 'name' => $name])

<textarea {{ $disabled ? 'disabled' : '' }} rows="2" style="resize: none;" placeholder="{{ $placeholder }}"
    name="{{ $name }}"
    class="block w-full h-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm"></textarea>
