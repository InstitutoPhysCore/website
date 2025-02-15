@props(['title' => 'Dropdown'])

<li x-data="{ open: false }">

<button id="{{ $title }}DropdownButton" type="button" role="button" @click="open = ! open" class="flex items-center justify-between w-full py-2 px-3 transition text-gray-100 rounded hover:bg-violet-900 lg:hover:bg-transparent lg:border-0 lg:hover:text-violet-600 lg:p-0 lg:w-auto">
{{$title}} 
	<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
		<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
	</svg>
</button>

<div id="{{ $title }}Dropdown" x-show="open" x-transition x-on:click.outside="open = false" class="z-10 absolute transition-opacity duration-300 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
	<ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
		{{ $slot }}
	</ul>
</div>

</li>