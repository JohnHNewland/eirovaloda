<x-layout>
    <x-slot name="title">
        Upload Material
    </x-slot>
    <style>
        #form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
        }
    </style>
    <div id="wrapper">
        <form id="form" action="{{ route('materials.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block font-semibold mb-1">{{__('materials.name')}}</label>
                <input type="text" id="title" name="title" class="w-full border border-gray-300 rounded px-2 py-1" value="{{ old('title') }}">
            </div>

            <div class="mb-4">
                <label for="file" class="block font-semibold mb-1">Fails:</label>
                <input type="file" id="file" name="file" class="hidden" onchange="document.getElementById('filename').textContent = this.files[0]?.name || ''">
            </div>

            <div class="mb-4 flex items-center gap-4">
                <div>
                    <label for="language" class="block font-semibold mb-1">Valoda:</label>
                    <select name="language" id="language" class="border rounded px-2 py-1">
                        @foreach($languages as $language)
                            <option value="{{ $language->id }}" {{ old('language') == $language->id ? 'selected' : '' }}>
                                {{ __($language->id) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="task" class="block font-semibold mb-1">Uzdevums:</label>
                    <input type="checkbox" id="task" name="task" class="w-5 h-5 mt-1" {{ old('task') ? 'checked' : '' }}>
                </div>
            </div>

            <div class="mb-4 grid grid-cols-3 gap-4">
                <div>
                    <label for="level" class="block font-semibold mb-1">Valodas līmenis:</label>
                    <select name="level" id="level" class="w-full border rounded px-2 py-1">
                        @foreach($languageLevels as $level)
                            <option value="{{ $level->id }}" {{ old('level') == $level->id ? 'selected' : '' }}>{{ $level->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="aspect" class="block font-semibold mb-1">Valodas nozare:</label>
                    <select name="aspect" id="aspect" class="w-full border rounded px-2 py-1">
                        @foreach($languageAspects as $aspect)
                            <option value="{{ $aspect->id }}" {{ old('aspect') == $aspect->id ? 'selected' : '' }}>
                                {{ __($aspect->id) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Apraksts -->
            <div class="mb-4">
                <label for="description" class="block font-semibold mb-1">Apraksts:</label>
                <textarea name="description" id="description" maxlength="500" rows="4" class="w-full border rounded px-2 py-1">{{ old('description') }}</textarea>
            </div>

            <!-- Submit -->
            <div class="text-center">
                <button type="submit" class="bg-white px-4 py-2 border rounded hover:bg-gray-100">Augšupielādēt</button>
            </div>
        </form>
    </div>
</x-layout>
