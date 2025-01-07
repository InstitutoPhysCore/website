@props(['title' => 'WIP'])

<li>
    <a href="#" class="block p-3 rounded-lg hover:bg-gray-100 transition">
        <div class="font-semibold">{{ $title }}</div>
        <span class="text-sm text-gray-500">{{ $slot }}</span>
    </a>
</li>