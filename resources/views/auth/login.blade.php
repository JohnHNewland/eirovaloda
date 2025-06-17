<x-layout>
    <x-slot name="title">
        {{__('navbar.login')}}
    </x-slot>
    <style>
        #wrapper {
            display: flex;
            justify-content: center;
        }
        #form {
            width: 50%;
        }

        .login-button {
            background-color: #F5EED2;
            border: 1px solid black;
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
            padding: 0.375rem 0.75rem;
            text-decoration: none;
        }

        .login-button:hover {
            background-color: #e9e0c1;
            color: black;
            border-color: gray;
        }

        .form-label {
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
        }

        .error-msg {
            width:50%;
            background-color: #F5EED2;
            color: black;
            font-family: 'Buenard', serif;
            font-size: 125%;
            border: 1px solid black;
            margin-top: 1vh;
            border-radius: 2px;
            list-style: none;
        }

        .error-list {
            list-style: none;
        }

        #error-wrapper {
            display: flex;
            justify-content: center;
        }

    </style>
    <div id="error-wrapper">
        @if ($errors->has('auth'))
            <div class="alert alert-danger error-msg">
                <ul class="error-list">
                    <li>{{__('validate.badLogin')}}</li>
                </ul>
            </div>
        @endif
    </div>

    <div id="wrapper">
        <form id="form" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">{{__('register.email')}}</label>
                <input type="email" name="email" class="form-control" required
                       value="{{ old('email') }}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">{{__('register.password')}}</label>
                <input type="password" name="password" class="form-control" required
                       value = "">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <button type="submit" class="btn login-button">{{__('register.login')}}</button>
        </form>
    </div>
</x-layout>
