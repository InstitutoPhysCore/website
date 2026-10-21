@props(['model'])

@if ($model->author_name)
    <div class="flex items-center gap-4">
        <x-avatar :src="$model->author_avatar" :name="$model->author_name"/>
        <div>
            @if ($model->author_link)
                <a href="{{ $model->author_link }}" class="text-xl font-bold hover:text-violet-600">{{ $model->author_name }}</a>
            @else
                <h2 class="text-xl font-bold">{{ $model->author_name }}</h2>
            @endif
            <h6 class="text-sm">{{ $model->author_role }}</h6>
        </div>
    </div>
@endif
