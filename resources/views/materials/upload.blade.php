<x-layout>
    <x-slot name="title">
        Upload Material
    </x-slot>
    <x-slot name="style">
        #wrapper {
            width: 100vw;
        }
        #form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #titleField {
            width: 25vw;
            display: flex;
            justify-content: center;
        }

        .input {
            border: 1px solid black;
            border-radius: 4px;
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
        }

        .input:hover {
        background-color: #e9e0c1;
        color: black;
        border-color: gray;
        }

        label, #file {
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
        }

        #materialTitle {
            height: 3vh;
            padding: 2vh 0;
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
    <div id="wrapper" class="mt-4">
        <form id="form" action="{{ route('materials.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div id="titleField" class="mb-4">
                <label for="file_name" class="block font-semibold m-2">{{__('materials.name')}}</label>
                <input type="text" id="materialTitle" name="file_name" class="input mt-3" value="{{ old('file_name') }}">
            </div>
            @error('file_name') <small class="mb-2 text-danger">{{ $message }}</small> @enderror

            <div class="mb-4">
                <label for="file_path" class="block font-semibold m-2">{{__('materials.file')}}</label>
                <input type="file" id="file" name="file_path" accept=".pdf, .docx">
            </div>
            @error('file_path') <small class="mb-2 text-danger">{{ $message }}</small> @enderror

            <div class="mb-4 flex items-center gap-4">
                <div>
                    <label for="language_id" class="block font-semibold m-2">{{__('materials.language')}}</label>
                    <select name="language_id" id="language" class="input px-2 py-1">
                        @foreach($languages as $language)
                            <option value="{{ $language->id }}" {{ old('language') == $language->id ? 'selected' : '' }}>
                                {{ __($language->id) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-4 grid grid-cols-3 gap-4">
                <div>
                    <label for="language_level_id" class="block font-semibold m-2">{{__('materials.languageLevel')}}</label>
                    <select name="language_level_id" id="level" class="w-full px-2 py-1 input">
                        @foreach($languageLevels as $level)
                            <option value="{{ $level->id }}" {{ old('level') == $level->id ? 'selected' : '' }}>{{ $level->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="language_aspect_id" class="block font-semibold m-2">{{__('materials.languageAspect')}}</label>
                    <select name="language_aspect_id" id="aspect" class="w-full px-2 py-1 input">
                        @foreach($languageAspects as $aspect)
                            <option value="{{ $aspect->id }}" {{ old('aspect') == $aspect->id ? 'selected' : '' }}>
                                {{ __($aspect->id) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-semibold m-2">{{__('materials.description')}}</label>
                <textarea name="description" id="description" placeholder="{{__('materials.optDescription')}}" maxlength="500" rows="4" class="w-full input px-2 py-1">{{ old('description') }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn px-4 py-2 input hover:bg-gray-100">{{__('materials.upload')}}</button>
            </div>
        </form>
    </div>
</x-layout>
