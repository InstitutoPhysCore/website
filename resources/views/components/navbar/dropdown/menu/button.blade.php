<li>
    <button id="{{$slot}}MenuButton" data-collapse-toggle="{{ $slot }}Menu" class="flex items-center justify-between w-full py-2 px-3 transition text-gray-100 rounded md:w-auto hover:bg-violet-900 md:hover:bg-transparent md:border-0 md:hover:text-violet-600 md:p-0">
        {{ $slot }}
        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>
</li>