@props(['src' => null, 'name' => '', 'size' => 'w-16 h-16'])

@if ($src)
    <img {{ $attributes->merge(['class' => "rounded-full object-cover shrink-0 $size"]) }} src="{{ $src }}" alt="{{ $name }}">
@else
    <span {{ $attributes->merge(['class' => "inline-flex shrink-0 items-center justify-center rounded-full bg-violet-800 font-bold text-white $size"]) }} aria-label="{{ $name }}">{{ \Illuminate\Support\Str::of($name)->explode(' ')->filter()->take(2)->map(fn ($p) => mb_substr($p, 0, 1))->implode('') }}</span>
@endif
