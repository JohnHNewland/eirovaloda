<x-layout>
    <x-slot name="title">
        Profile
    </x-slot>
    <x-slot name="style">
        #wrapper {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .material {
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 150%;
            text-decoration: none;
            color: black;
        }

        .material:hover {
            text-decoration: underline;
        }

        .action-btn {
            background-color: #F5EED2;
            border: 1px solid black;
            font-family: 'Buenard', serif;
            text-decoration: none;
            color: black;
        }

        .action-btn:hover {
            background-color: #e9e0c1;
            border-color: gray;
        }

        .material-row {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.5rem;
        }

        #uploadedMaterials {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

    </x-slot>
    <div id="wrapper">
        <h1>{{__('profile.uploadedMaterials')}}</h1>
        <div id="uploadedMaterials">
            @foreach($materials as $material)
                <div class="material-row">
                    <a class="material" href="{{ route('materials.show', $material->id) }}">{{ $material->file_name }}</a>
                    <a href="{{ route('materials.edit', $material->id) }}" class="action-btn m-2">{{ __('profile.editMaterial') }}</a>
                    <form action="{{ route('materials.destroy', $material->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn m-2"  onclick="return confirm('{{ __('profile.deleteWarning') }}')">{{ __('profile.deleteMaterial') }}</button>
                    </form>
                </div>
            @endforeach
        </div>

        <h1>{{__('profile.likedMaterials')}}</h1>
        <div id="likedMaterials">
            @foreach($likes as $material)
                <div class="material-row">
                    <a class="material" href="{{ route('materials.show', $material->id) }}">{{ $material->file_name }}</a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
