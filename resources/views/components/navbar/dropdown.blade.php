@props(['title' => 'Dropdown'])

<li>

<button id="{{ $title }}DropdownButton" data-dropdown-toggle="{{ $title }}Dropdown" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
{{$title}} 
	<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
		<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
	</svg>
</button>

<div id="{{ $title }}Dropdown" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
	<ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
		{{ $slot }}
	</ul>
</div>

</li>