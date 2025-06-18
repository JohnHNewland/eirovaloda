<x-layout>
    <x-slot name="title">
        Material View
    </x-slot>
    <x-slot name="style">
        #materialInfo {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .label {
            font-weight: bold;
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
        }
    </x-slot>
    <div id="materialInfo" class="mt-2">
        <h1 class="mb-2">{{$material->file_name}}</h1>
        <p class="mb-2"> <span class="label">{{__('materials.description')}} </span> {{$material->description}}</p>
        <div id="like">
            <p class="mb-2"> <span class="label">{{__('materials.likes')}} </span> {{$material->likes}}</p>
            <form action="{{ route('materials.like', [app()->getLocale(), $material->id, $liked]) }}" method="POST">
                @csrf
                @if(!$liked)
                    <button type="submit" class="btn btn-sm btn-primary">
                        {{ __('materials.like') }}
                    </button>
                @else
                    <button type="submit" class="btn btn-sm btn-primary">
                        {{ __('materials.dislike') }}
                    </button>
                @endif
                <a href="{{ route('materials.download', [$material->id]) }}" class="btn btn-primary">
                    {{ __('materials.download') }}
                </a>
            </form>
        </div>
    </div>
</x-layout>
