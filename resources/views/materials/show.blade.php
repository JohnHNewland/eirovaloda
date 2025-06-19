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

        .like, .download {
            border: 1px solid black;
            border-radius: 4px;
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
        }

        .like:hover {
            background-color: #e9e0c1;
            color: black;
            border-color: gray;
        }

        .download:hover {
            background-color: #e9e0c1;
            color: black;
            border-color: gray;
        }

        .download {
            text-decoration: none;
            color: black;
        }

        .success-msg {
            width:70%;
            background-color: #F5EED2;
            color: black;
            font-family: 'Buenard', serif;
            font-size: 125%;
            border: 1px solid black;
            margin-top: 1vh;
            border-radius: 2px;
            list-style: none;
        }

        #success-wrapper {
            display: flex;
            justify-content: center;
        }

    </x-slot>
    <div id="success-wrapper">
        @if (session('status'))
            <div class="alert success-msg">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div id="materialInfo" class="mt-2">
        <h1 class="mb-2">{{$material->file_name}}</h1>
        <p class="mb-2"> <span class="label">{{__('materials.description')}} </span> {{$material->description}}</p>
        <p class="mb-2"> <span class="label">{{__('materials.language')}} </span> {{__($material->language_id)}}</p>
        <p class="mb-2"> <span class="label">{{__('materials.languageLevel')}} </span> {{__($material->language_level_id)}}</p>
        <p class="mb-2"> <span class="label">{{__('materials.languageAspect')}} </span> {{__($material->language_aspect_id)}}</p>
        <div id="like" class="mb-4">
            <p class="mb-2"> <span class="label">{{__('materials.likes')}} </span> {{$material->likes}}</p>
            @auth
                <form action="{{ route('materials.like', [app()->getLocale(), $material->id, $liked]) }}" method="POST">
                    @csrf
                    @if(!$liked)
                        <button type="submit" class="btn like">
                            {{ __('materials.like') }}
                        </button>
                    @else
                        <button type="submit" class="btn like">
                            {{ __('materials.dislike') }}
                        </button>
                    @endif
                </form>
            @endauth
        </div>
        <a href="{{ route('materials.download', [$material->id]) }}" class="btn download">
            {{ __('materials.download') }}
        </a>
    </div>
</x-layout>
