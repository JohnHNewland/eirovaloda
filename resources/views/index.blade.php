<x-layout>
    <x-slot name="title">
        Eirovaloda
    </x-slot>
    <x-slot name="style">
        #intro {
            height: 70%;
            justify-content: space-between;
            background-color: #F5EED2;
            font-family: 'Buenard', serif;
            font-size: 250%;
            margin: 0 15%;
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
    <div id="intro" class="d-flex flex-column gap-3">
        <p>{{__('index.intro1')}}</p>
        <p>{{__('index.intro2')}}</p>
        <p>{{__('index.intro3')}}</p>
    </div>
</x-layout>
