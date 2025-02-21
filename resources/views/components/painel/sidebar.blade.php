<aside class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden bg-zinc-900 text-white px-6 lg:static font-medium lg:translate-x-0">
	<div class="my-6">
		<!-- Header -->
		<a href="/" class="flex justify-center items-center space-x-3 hover:scale-105 transition">
			<img src="{{ asset('images/astronauta.webp') }}" class="w-10"/>
    		<span class="self-center text-2xl font-semibold whitespace-nowrap text-white">PhysCore</span>
		</a>
	</div>

	<hr class="h-0.5 border-t-0 bg-zinc-800" />

	<ul class="my-6">
		<!-- Link -->
		<li>
			<a href="/" class="flex items-center rounded-lg px-4 py-4 gap-2 transition hover:bg-zinc-800 w-full">
				<i class="fa-solid fa-gauge"></i>
				Dashboard
			</a>
		</li>
	</ul>

	<hr class="h-0.5 border-t-0 bg-zinc-800" />

	<ul class="my-6">
		<!-- Dropdown -->
		<li x-data="{ open: false }">
			<button id="DropdownButton" type="button" role="button" @click="open = ! open" class="flex justify-between items-center rounded-lg px-4 py-2 transition hover:bg-zinc-800 w-full">
				Nicolas
					<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
					</svg>
			</button>
			<div id="Dropdown" x-show="open" x-transition x-on:click.outside="open = false" class="font-normal bg-white divide-y divide-gray-100 rounded-lg">
				<ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
					<li>
						<a {{ $attributes->merge(['class' => 'block px-4 py-2 transition hover:bg-gray-100'])}}>Bunga</a>
					</li>
				</ul>
			</div>
		</li>
	</ul>
</aside>
