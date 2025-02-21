@props(['title' => "Dropdown"])

<li x-data="{ open: false }">
			<button id="{{ $title }}DropdownButton" type="button" role="button" @click="open = ! open" class="flex justify-between items-center rounded-lg px-4 py-2 transition hover:bg-zinc-800 w-full">
				{{ $title }}
					<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
					</svg>
			</button>
			<div id="{{ $title }}Dropdown" x-show="open" x-transition x-on:click.outside="open = false" class="font-normal bg-white divide-y divide-gray-100 rounded-lg">
				<ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
					{{ $slot }}
				</ul>
			</div>
		</li>