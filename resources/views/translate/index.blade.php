<x-layout>
    <x-slot name="title">Translator</x-slot>
    <x-slot name="style">
        #translator {
            display: flex;
            justify-content: center;
            align-items: start;
            gap: 2rem;
            padding: 2rem;
        }
        .block {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #translateBtn {
            margin-top: 1rem;
        }

        label {
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
        }

        .input{
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
    </x-slot>

    <form id="translator" onsubmit="return false;">
        <div class="block">
            <label for="sourceLanguage">{{__('translate.chosenLanguage')}}
                <select id="sourceLanguage" name="sourceLanguage">
                    <option value="lv">{{__('translate.latvian')}}</option>
                    <option value="en">{{__('translate.english')}}</option>
                    <option value="de">{{__('translate.german')}}</option>
                    <option value="fr">{{__('translate.french')}}</option>
                    <option value="sv">{{__('translate.swedish')}}</option>
                </select>
            </label>
            <textarea id="sourceText" class="input" name="sourceText" placeholder="Ievadi tekstu..."></textarea>
        </div>

        <div class="block">
            <label for="targetLang">{{__('translate.targetLanguage')}}
                <select id="targetLanguage" name="targetLanguage">
                    <option value="lv">{{__('translate.latvian')}}</option>
                    <option value="en">{{__('translate.english')}}</option>
                    <option value="de">{{__('translate.german')}}</option>
                    <option value="fr">{{__('translate.french')}}</option>
                    <option value="sv">{{__('translate.swedish')}}</option>
                </select>
            </label>
            <textarea id="targetText" class='input' name="targetText" ></textarea>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <button id="translateBtn" class="btn btn-dark" onclick="doTranslate()">Tulkot</button>
        </div>
    </form>

    <script>
        function doTranslate() {
            fetch("{{ route('translate.perform') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    text: document.getElementById('sourceText').value,
                    source_lang: document.getElementById('sourceLanguage').value,
                    target_lang: document.getElementById('targetLanguage').value
                })
            })
                .then(res => res.json())
                .then(data => {
                    document.getElementById('targetText').value = data.translated;
                    console.log('Translation successful!');
                })
                .catch(error => {
                    console.error('Translation error:', error);
                });
        }
    </script>
</x-layout>
