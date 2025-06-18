<x-layout>
    <x-slot name="title">
        {{__('navbar.register')}}
    </x-slot>
    <x-slot name="style">
        #wrapper {
            display: flex;
            justify-content: center;
        }
        #form {
            width: 70%;
        }

        .register-button {
            background-color: #F5EED2;
            border: 1px solid black;
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
            padding: 0.375rem 0.75rem;
            text-decoration: none;
        }

        .register-button:hover {
            background-color: #e9e0c1;
            color: black;
            border-color: gray;
        }

        .form-label {
            font-weight: 500;
            font-family: 'Buenard', serif;
            font-size: 125%;
        }

    </x-slot>
    <div id="wrapper">
        <form id="form" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">{{__('register.username')}}</label>
                <input type="text" name="username" class="form-control" required
                       value="{{ old('username') }}">
                @error('username') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
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
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{__('register.confirmPassword')}}</label>
                <input type="password" name="password_confirmation" class="form-control" required>
                @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <label class="form-label me-2" for="is_teacher">
                    {{ __('register.teacher') }}
                </label>
                <input type="checkbox" name="is_teacher" class="form-check-input mt-2" id="is_teacher" {{ old('is_teacher') ? 'checked' : '' }}>
                @error('is_teacher')
                <small class="text-danger d-block">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn register-button">{{__('register.register')}}</button>
        </form>
    </div>

</x-layout>
