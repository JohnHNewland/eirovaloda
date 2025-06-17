<x-layout>
    <x-slot name="title">
        Materials
    </x-slot>
    <style>
        #materialBody {
            height: 100%;
        }
        ul {
            list-style-type: none;
        }
        #topics {
            width: 25%;
        }
        #materials {
            width: 55%;
            margin-left: 20%;
        }
        #materials a, #toolbar a {
            text-decoration: none;
        }
        #vertLine {
            height: 100%;
            width: 1px;
            background-color: black;
        }
        .form-label {
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
        }

        .group p{
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
        }

        .group a {
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
            text-decoration: none;
            color: black;
        }
        summary {
            list-style: none;
        }

        #upload {
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
            text-decoration: none;
            color: black;
        }

    </style>
    <div id="materialBody" class="d-flex flex-row">
        <div id="topics">
            <ul>
                <li>
                    <details class="group">
                        <summary class="font-semibold text-lg px-4 bg-gray-100 hover:bg-gray-200 rounded">
                            <p>A1</p>
                        </summary>
                        <ul class="ml-6 my-2 space-y-1">
                            <li><a href="">{{ __('materials.listening') }}</a></li>
                            <li><a href="">{{ __('materials.reading') }}</a></li>
                            <li><a href="">{{ __('materials.syntax') }}</a></li>
                            <li><a href="">{{ __('materials.morphology') }}</a></li>
                            <li><a href="">{{ __('materials.specifics') }}</a></li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details class="group">
                        <summary class="font-semibold text-lg px-4 bg-gray-100 hover:bg-gray-200 rounded">
                            <p>A2</p>
                        </summary>
                        <ul class="ml-6 my-2 space-y-1">
                            <li><a href="">{{ __('materials.listening') }}</a></li>
                            <li><a href="">{{ __('materials.reading') }}</a></li>
                            <li><a href="">{{ __('materials.syntax') }}</a></li>
                            <li><a href="">{{ __('materials.morphology') }}</a></li>
                            <li><a href="">{{ __('materials.specifics') }}</a></li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details class="group">
                        <summary class="font-semibold text-lg px-4 bg-gray-100 hover:bg-gray-200 rounded">
                            <p>B1</p>
                        </summary>
                        <ul class="ml-6 my-2 space-y-1">
                            <li><a href="{{route('materials.aspect', ['B1', 'materials.listening'])}}">{{ __('materials.listening') }}</a></li>
                            <li><a href="">{{ __('materials.reading') }}</a></li>
                            <li><a href="">{{ __('materials.syntax') }}</a></li>
                            <li><a href="">{{ __('materials.morphology') }}</a></li>
                            <li><a href="">{{ __('materials.specifics') }}</a></li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details class="group">
                        <summary class="font-semibold text-lg px-4 bg-gray-100 hover:bg-gray-200 rounded">
                            <p>B2</p>
                        </summary>
                        <ul class="ml-6 my-2 space-y-1">
                            <li><a href="">{{ __('materials.listening') }}</a></li>
                            <li><a href="">{{ __('materials.reading') }}</a></li>
                            <li><a href="">{{ __('materials.syntax') }}</a></li>
                            <li><a href="">{{ __('materials.morphology') }}</a></li>
                            <li><a href="">{{ __('materials.specifics') }}</a></li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details class="group">
                        <summary class="font-semibold text-lg px-4 bg-gray-100 hover:bg-gray-200 rounded">
                            <p>C1</p>
                        </summary>
                        <ul class="ml-6 my-2 space-y-1">
                            <li><a href="">{{ __('materials.listening') }}</a></li>
                            <li><a href="">{{ __('materials.reading') }}</a></li>
                            <li><a href="">{{ __('materials.syntax') }}</a></li>
                            <li><a href="">{{ __('materials.morphology') }}</a></li>
                            <li><a href="">{{ __('materials.specifics') }}</a></li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details class="group">
                        <summary class="font-semibold text-lg px-4 bg-gray-100 hover:bg-gray-200 rounded">
                            <p>C2</p>
                        </summary>
                        <ul class="ml-6 my-2 space-y-1">
                            <li><a href="">{{ __('materials.listening') }}</a></li>
                            <li><a href="">{{ __('materials.reading') }}</a></li>
                            <li><a href="">{{ __('materials.syntax') }}</a></li>
                            <li><a href="">{{ __('materials.morphology') }}</a></li>
                            <li><a href="">{{ __('materials.specifics') }}</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
        <div id="vertLine"></div>
        <div id="materials" class="d-flex flex-column">
            <div id="toolbar" class="d-flex justify-content-between">
                <form>
                    <label for="filterDropdown" class="form-label">{{__('materials.filter')}}</label>
                    <select id="languageSelect">
                        <option value="">{{__('materials.selectLanguage')}}</option>
                        @foreach($languages as $language)
                            <option value="{{$language->id}}" {{ old('languageSelect') == __($language->id) ? 'selected' : '' }}>
                                {{__($language->id)}}
                            </option>
                        @endforeach
                    </select>
                </form>
                @can('create', App\Models\Material::class)
                    <a id="upload" href="{{route('materials.showUpload')}}">{{__('materials.upload')}}</a>
                @endcan
            </div>
            @foreach($materials as $material)
                <a href="#">{{$material->file_name}}</a>
            @endforeach
        </div>
    </div>
</x-layout>
