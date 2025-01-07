@props(['name' => 'WIP'])

<div id="{{ $name }}Menu" class="mt-1 hidden transition border-gray-200 shadow-sm bg-gray-50 md:bg-white border-y">
    <div class="grid max-w-screen-xl px-4 py-5 mx-auto text-gray-900 sm:grid-cols-2 md:px-6">
        <ul>
            <x-navbar.dropdown.menu.card/>
        </ul>
    </div>
</div>