<x-layout>
    <x-slot name="title">
        Materials
    </x-slot>
    <x-slot name="style">
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
            margin-left: 10%;
        }
        #materials a, #toolbar a {
            text-decoration: none;
        }
        #vertLine {
            height: 100%;
            width: 1px;
            background-color: black;
        }
        .form-label, select {
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

        #upload{
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
            text-decoration: none;
            color: black;
            border: 1px solid black;
        }

        #upload:hover {
            background-color: #e9e0c1;
            color: black;
            border-color: gray;
        }

        .material {
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 150%;
            text-decoration: underline;
            color: black;
        }

        #materialTitle {
            font-weight: 500;
            font-family: 'Buenard', serif;
            margin: 2vh 0;
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
    <div id="materialBody" class="d-flex flex-row">
        <div id="topics">
            <ul>
                <li>
                    <details class="group">
                        <summary class="font-semibold text-lg px-4 bg-gray-100 hover:bg-gray-200 rounded">
                            <p>A1</p>
                        </summary>
                        <ul class="ml-6 my-2 space-y-1">
                            <li><a href="{{route('materials.aspect', ['A1', 'materials.listening'])}}">{{ __('materials.listening') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['A1', 'materials.reading'])}}">{{ __('materials.reading') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['A1', 'materials.syntax'])}}">{{ __('materials.syntax') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['A1', 'materials.morphology'])}}">{{ __('materials.morphology') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['A1', 'materials.specifics'])}}">{{ __('materials.specifics') }}</a></li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details class="group">
                        <summary class="font-semibold text-lg px-4 bg-gray-100 hover:bg-gray-200 rounded">
                            <p>A2</p>
                        </summary>
                        <ul class="ml-6 my-2 space-y-1">
                            <li><a href="{{route('materials.aspect', ['A2', 'materials.listening'])}}">{{ __('materials.listening') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['A2', 'materials.reading'])}}">{{ __('materials.reading') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['A2', 'materials.syntax'])}}">{{ __('materials.syntax') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['A2', 'materials.morphology'])}}">{{ __('materials.morphology') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['A2', 'materials.specifics'])}}">{{ __('materials.specifics') }}</a></li>
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
                            <li><a href="{{route('materials.aspect', ['B1', 'materials.reading'])}}">{{ __('materials.reading') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['B1', 'materials.syntax'])}}">{{ __('materials.syntax') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['B1', 'materials.morphology'])}}">{{ __('materials.morphology') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['B1', 'materials.specifics'])}}">{{ __('materials.specifics') }}</a></li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details class="group">
                        <summary class="font-semibold text-lg px-4 bg-gray-100 hover:bg-gray-200 rounded">
                            <p>B2</p>
                        </summary>
                        <ul class="ml-6 my-2 space-y-1">
                            <li><a href="{{route('materials.aspect', ['B2', 'materials.listening'])}}">{{ __('materials.listening') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['B2', 'materials.reading'])}}">{{ __('materials.reading') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['B2', 'materials.syntax'])}}">{{ __('materials.syntax') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['B2', 'materials.morphology'])}}">{{ __('materials.morphology') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['B2', 'materials.specifics'])}}">{{ __('materials.specifics') }}</a></li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details class="group">
                        <summary class="font-semibold text-lg px-4 bg-gray-100 hover:bg-gray-200 rounded">
                            <p>C1</p>
                        </summary>
                        <ul class="ml-6 my-2 space-y-1">
                            <li><a href="{{route('materials.aspect', ['C1', 'materials.listening'])}}">{{ __('materials.listening') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['C1', 'materials.reading'])}}">{{ __('materials.reading') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['C1', 'materials.syntax'])}}">{{ __('materials.syntax') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['C1', 'materials.morphology'])}}">{{ __('materials.morphology') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['C1', 'materials.specifics'])}}">{{ __('materials.specifics') }}</a></li>
                        </ul>
                    </details>
                </li>
                <li>
                    <details class="group">
                        <summary class="font-semibold text-lg px-4 bg-gray-100 hover:bg-gray-200 rounded">
                            <p>C2</p>
                        </summary>
                        <ul class="ml-6 my-2 space-y-1">
                            <li><a href="{{route('materials.aspect', ['C2', 'materials.listening'])}}">{{ __('materials.listening') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['C2', 'materials.reading'])}}">{{ __('materials.reading') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['C2', 'materials.syntax'])}}">{{ __('materials.syntax') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['C2', 'materials.morphology'])}}">{{ __('materials.morphology') }}</a></li>
                            <li><a href="{{route('materials.aspect', ['C2', 'materials.specifics'])}}">{{ __('materials.specifics') }}</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>
        <div id="vertLine"></div>
        <div id="materials" class="d-flex flex-column items-center">
            <div id="toolbar" class="d-flex justify-content-between mt-4">
                <form method="POST" action="{{route('materials.applyFilter')}}">
                    @csrf
                    <label for="filterDropdown" class="form-label">{{__('materials.filter')}}</label>
                    <select id="languageSelect" name="languageSelect" onchange="this.form.submit()">
                        <option value="">{{__('materials.selectLanguage')}}</option>
                        @foreach($languages as $language)
                            <option value="{{$language->id}}" {{ __(old('languageSelect')) == __($language->id) ? 'selected' : '' }}>
                                {{__($language->id)}}
                            </option>
                        @endforeach
                    </select>
                </form>
                @can('create', App\Models\Material::class)
                    <a id="upload" class="btn" href="{{route('materials.showUpload')}}">{{__('materials.upload')}}</a>
                @endcan
            </div>
            <div id="success-wrapper">
                @if (session('status'))
                    <div class="alert success-msg">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            @if($materials->isNotEmpty())
                <h1 id="materialTitle" class="">{{__('materials.allMaterials')}}</h1>
            @endif
            <div id="materialDocs" class="d-flex flex-column align-items-center">
                @foreach($materials as $material)
                    <a class="material mb-2" href="{{route('materials.show', $material->id)}}">{{$material->file_name}}</a>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
